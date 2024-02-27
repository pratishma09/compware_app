<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script async src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    @vite('resources/css/app.css')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

    <title>Deerwalk Training Center</title>
</head>
<body class="roboto overflow-x-hidden">
    <div id="app">
        <main class="">
            @yield('layout')
            @include('events.components.footer')
        </main>
    </div>
    <script>
        function toggleAnswer(id) {
            const answer = document.getElementById(id);
            const question = document.getElementById("question" + id.slice(-1)); // Extract question number
            if (answer.classList.contains('show')) {
                answer.classList.remove('show');
                answer.style.maxHeight = '0';
                question.classList.remove('rounded-b-md');
                question.classList.add('rounded-md');
            } else {
                answer.classList.add('show');
                answer.style.maxHeight = answer.scrollHeight + 'px';
                question.classList.remove('rounded-md');
                question.classList.add('rounded-t-md');
            }
        }
    </script>
</body>
</html>