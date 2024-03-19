<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentcertificateRequest;
use App\Models\Course;
use App\Models\Image;
use App\Models\Studentcertificate;
use App\Models\Team;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Imagick;
use setasign\Fpdi\Fpdi;

class StudentCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $studentcertificates = Studentcertificate::all();
        $courses = Course::all();
        $teams = Team::all();
        return view('user.studentcertificates.index')->with(compact('studentcertificates', 'courses', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $studentcertificates = Studentcertificate::all();
        $courses = Course::all();
        $teams = Team::all();
        return view('admin.studentcertificates.create')->with(compact('studentcertificates', 'courses', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentcertificateRequest $request)
    {
        //
        try {
            $data = $request->validated();
            $data['verificationId'] = 'DTC-' . date('Ymd') . '-' . str_pad(Studentcertificate::count() + 1, 3, '0', STR_PAD_LEFT);
            if ($request->hasFile('image')) {
                $filenameI = 'studentcertificate_image_' . uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('assets'), $filenameI);
                $data['image'] = $filenameI;
            }
            $studentcertificate = Studentcertificate::create($data);

            return redirect(route('admin.studentcertificates.list'))->with('success', 'Student Certificate created successfully!');
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Not found!');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($verificationId)
    {
        try {
            $studentcertificate = Studentcertificate::where('verificationid', $verificationId)->firstOrFail();
            $this->generatePDF($studentcertificate);
            return view('user.studentcertificates.show', ['studentcertificate' => $studentcertificate]);
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Not found!');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $studentcertificates = Studentcertificate::where('id', $id)->first();
        $courses = Course::all();
        $teams = Team::all();
        return view('admin.studentcertificates.edit')->with(compact('studentcertificates', 'courses', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentcertificateRequest $request, $id)
    {
        //
        try {
            $studentcertificate = Studentcertificate::findOrFail($id);
            $verificationid = $studentcertificate->verificationId ?? 'DTC-' . date('Ymd') . '-' . str_pad(Studentcertificate::count() + 1, 3, '0', STR_PAD_LEFT);
            $data['verificationId'] = $verificationid;

            $studentcertificate->update($request->all());

            if ($request->hasFile('image')) {

                if ($studentcertificate->image && file_exists(public_path('assets/' . $studentcertificate->image))) {
                    unlink(public_path('assets/' . $studentcertificate->image));
                }

                $filename = 'studentcertificate_image_' . uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('assets'), $filename);
                $studentcertificate->update(['image' => $filename]);
            }
            return redirect(route('admin.studentcertificates.list'))->with('success', 'Student Certificate updated successfully');
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Not found!');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $studentcertificate = Studentcertificate::where('id', $id)->first();
            $studentcertificate->delete();
            return redirect(route('admin.studentcertificates.list'))->with('success', 'Student Certificate deleted successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function showPDF($id)
    {
        $studentcertificate = Studentcertificate::findOrFail($id);
        $pdfContent = $this->generatePDF($studentcertificate);
        $imageContent = $this->convertPDFToImage($pdfContent);

        return response($imageContent, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'inline; filename="certificate.png"',
        ]);
    }

    private function generatePDF($studentcertificate)
    {
        try {
            $pdf = new Fpdi();
            $pdf->AddPage();
            $pdf->setSourceFile(public_path('assets/Resized_certificate_banner..pdf'));
            $tplId = $pdf->importPage(1);
            $pdf->useTemplate($tplId, 0, 0, null, null, true);

            $filename = $studentcertificate->team->team_signature;
            if (!str_ends_with($filename, '.png')) {
                $filename .= '.png';
            }

            if (filter_var($filename, FILTER_VALIDATE_URL)) {
                $imageData = Http::get($filename)->body();
                $imagePath = 'temp/' . uniqid() . '.png';
                Storage::put($imagePath, $imageData);
                $signatureImagePath = storage_path('app/' . $imagePath);
            } else {
                $signatureImagePath = public_path("assets/{$filename}");
            }
            $pdf->SetFont('Arial', '', 18);
            $pdf->SetTextColor(0, 0, 0);
            $nameWidth = $pdf->GetStringWidth(strtoupper($studentcertificate->name));
            $courseNameWidth = $pdf->GetStringWidth(strtoupper($studentcertificate->course->course_name));

            $nameX = 117 + (60 - $nameWidth) / 2;
            $courseNameX = 114 + (60 - $courseNameWidth) / 2;
            $pdf->SetXY($nameX, 74);
            $pdf->Cell(0, 0, strtoupper($studentcertificate->name));
            $pdf->SetXY($courseNameX, 110);
            $pdf->Cell(0, 0, strtoupper($studentcertificate->course->course_name));
            $pdf->SetXY(104, 120);
            $pdf->SetFont('Arial', '', 14);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(0, 12, $studentcertificate->duration);
            $pdf->SetXY(117, 140);
            $pdf->Cell(0, 2, $studentcertificate->startdate);
            $pdf->SetXY(175, 140);
            $pdf->Cell(0, 2, $studentcertificate->enddate);
            $pdf->SetXY(130, 160);
            $pdf->Cell(0, 2, $studentcertificate->verificationId);
            $pdf->Image($signatureImagePath, 200, 155, 60);
            $pdf->SetFont('Arial', '', 12);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetXY(210, 189);
            $pdf->Cell(0, 0, $studentcertificate->team->team_name);

            // $trainerTitleWidth = $pdf->GetStringWidth($studentcertificate->trainer_title);
            // $trainerTitleX = $pdf->GetX(); 
            // $trainerTitleY = $pdf->GetY(); 
            // $pdf->SetXY($trainerTitleX, $trainerTitleY);
            // $pdf->Cell(0, 0, $studentcertificate->trainer_title);

            return $pdf->Output('', 'S');

        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Not found!');
        } catch (Exception $e) {
            dd($e);
            return back()->with('error', 'Something went wrong!');
        }
    }
    private function convertPDFToImage($pdfContent)
    {
        try {
            $imagick = new Imagick();
            $imagick->readImageBlob($pdfContent);

            foreach ($imagick as $key => $page) {

                $page->setImageFormat('png');
            }

            $imagick = $imagick->appendImages(true);

            $imageContent = $imagick->getImageBlob();

            $imagick->clear();
            $imagick->destroy();

            return $imageContent;
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }
    public function downloadImage($id)
    {
        $studentcertificate = StudentCertificate::findOrFail($id);
        $pdfContent = $this->generatePDF($studentcertificate);
        $imageContent = $this->convertPDFToImage($pdfContent);

        return response($imageContent)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="certificate.png"');
    }

    public function downloadPDF($id)
    {
        $studentcertificate = StudentCertificate::findOrFail($id);
        $pdfContent = $this->generatePDF($studentcertificate);

        return response($pdfContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="certificate.pdf"');
    }

    public function adminShow()
    {
        //
        $studentcertificates = Studentcertificate::paginate(10);
        $courses = Course::all();
        $teams = Team::all();
        return view('admin.studentcertificates.list')->with(compact('studentcertificates', 'courses', 'teams'));
    }

}
