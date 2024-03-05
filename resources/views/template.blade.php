<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <!-- Scripts -->
    <script async src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    @vite('resources/css/app.css')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"></script>

    <title>Deerwalk Training Center</title>
</head>

<body class="roboto bg-gray-100 overflow-x-hidden">
    <div id="app">
        <main>
            @include('components.navbar')
            @yield('content')
        </main>
    </div>

    @include('components.maps')
    @include('components.footer')
    @include('sweetalert::alert')
    @yield('scripts')
    @stack('scripts')

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    
        document.getElementById('categoryFilter').addEventListener('change', function() {
            filtercoursecategories();
        });
    
        function filtercoursecategories() {
            var coursecategories = $('#categoryFilter').val();
    
            $.ajax({
                type: "GET",
                url: "{{ route('course.coursecategories') }}",
                data: {
                    coursecategories: coursecategories,
                },
                success: function(response) {
                    console.log('Success:', response);
                    $('#courseList').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>
    
</body>

</html>
