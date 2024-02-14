<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentcertificateRequest;
use App\Models\Course;
use App\Models\Studentcertificate;
use App\Models\Team;
use Exception;
use Imagick;
use Spatie\PdfToImage\Pdf;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
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
        return view('studentcertificates.index')->with(compact('studentcertificates', 'courses', 'teams'));
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
        return view('studentcertificates.create')->with(compact('studentcertificates', 'courses', 'teams'));
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

            return redirect(route('studentcertificate.create'))->with('success', 'StudentCertificate created successfully!');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Studentcertificates not found'], 404);
        } catch (Exception $e) {
            dd($e);
            return response()->json(['error' => 'Internal server error', '$e'], 500);
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
            return view('studentcertificates.show', ['studentcertificate' => $studentcertificate]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Student Certificate not found'], 404);
        } catch (Exception $e) {
            dd($e);
            return response()->json(['error' => 'Internal server error'], 500);
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
        return view('studentcertificates.edit')->with(compact('studentcertificates', 'courses', 'teams'));
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
            return redirect(route('studentcertificate.index'))->with('success', 'studentcertificate updated successfully');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'studentcertificates not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Internal server error'], 500);
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
            return redirect(route('studentcertificate.index'))->with('success', 'Studentcertificates deleted successfully');
        } catch (Exception $e) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function showPDF($id)
{
    $studentcertificate = Studentcertificate::findOrFail($id);
    $pdfContent = $this->generatePDF($studentcertificate);
    $imageContent = $this->convertPDFToImage($pdfContent);

    // Return image response
    return response($imageContent, 200, [
        'Content-Type' => 'image/png',
        'Content-Disposition' => 'inline; filename="certificate.png"',
    ]);
}


    private function generatePDF($studentcertificate)
    {
        try {

            // Load the existing PDF template
            $pdf = new Fpdi();
            $pdf->AddPage();
            $pdf->setSourceFile(public_path('assets/Resized_certificate_banner..pdf'));
            $tplId = $pdf->importPage(1);
            $pdf->useTemplate($tplId, 0, 0, null, null, true);

            $filename = $studentcertificate->team->team_signature;
            if (!str_ends_with($filename, '.png')) {
                $filename .= '.png';
            }
            $signatureImagePath = public_path("assets/{$filename}");

            // Add data to the PDF
            $pdf->SetFont('Arial', '', 14);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetXY(140, 72);
            $pdf->Cell(0, 0, $studentcertificate->name);
            $pdf->SetXY(140, 110);
            $pdf->Cell(0, 0, $studentcertificate->course->course_name);
            $pdf->SetXY(103, 120);
            $pdf->Cell(0, 12, $studentcertificate->duration);
            $pdf->SetXY(120, 140);
            $pdf->Cell(0, 2, $studentcertificate->startdate);
            $pdf->SetXY(170, 140);
            $pdf->Cell(0, 2, $studentcertificate->enddate);
            $pdf->SetXY(130, 160);
            $pdf->Cell(0, 2, $studentcertificate->verificationId);
            $pdf->Image($signatureImagePath, 200, 155, 60);
            $pdf->SetFont('Arial', '', 12);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetXY(210, 189);
            $pdf->Cell(0, 0, $studentcertificate->team->team_name . ",");

            $pdf->SetXY(240, 189);
            $pdf->Cell(0, 0, $studentcertificate->trainer_title);

            // Output the PDF content
            return $pdf->Output('', 'S');

        } catch (ModelNotFoundException $e) {
            // Handle the case where the Studentcertificate is not found
            return response()->json(['error' => 'Student certificate not found'], 404);
        } catch (Exception $e) {
            // Handle other exceptions
            dd($e);
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
    private function convertPDFToImage($pdfContent)
{
    try {
        // Create a temporary file to store the PDF content
        $tempPdfPath = tempnam(sys_get_temp_dir(), 'pdf_');
        file_put_contents($tempPdfPath, $pdfContent);

        // Instantiate the Pdf class with the PDF file path
        $pdf = new Pdf($tempPdfPath);

        // Convert the PDF to an image (PNG format) and get the image path
        $imagePath = tempnam(sys_get_temp_dir(), 'image_');
        $pdf->saveImage($imagePath);

        // Read the image content
        $imageContent = file_get_contents($imagePath);

        // Clean up temporary files
        unlink($tempPdfPath);
        unlink($imagePath);

        return $imageContent;

    } catch (Exception $e) {
        // Handle exceptions
        dd($e);
        return response()->json(['error' => 'Internal server error'], 500);
    }
}
}
