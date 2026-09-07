<!DOCTYPE html>
<html>
<head>
    <title>Toko Elektronik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    {{ $slot ?? '' }}
    @yield('content')
</body>
</html>
