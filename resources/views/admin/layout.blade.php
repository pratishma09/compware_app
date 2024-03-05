<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="roboto">
    <div class="flex">
        @include('admin.component.dashboard')
        <div class="flex-1 mx-5">
            @include('admin.component.logout')
            @yield('admin')
        </div>
    </div>
    @include('sweetalert::alert')
</body>

<script>
    function submitLogoutForm() {
        document.getElementById('logoutForm').submit();
    }
</script>

</html>
