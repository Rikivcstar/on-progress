<!DOCTYPE html>
<html>
<head>
    <title>{{ $title ?? 'Toko Elektronik' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @if(session('success'))
        <div class="max-w-4xl mx-auto mt-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
    <nav class="bg-blue-600 text-white p-4 flex justify-between gap-10">
        <a href="{{ route('products.index') }}" class="font-bold">Toko Elektronik</a>

        @auth
        <span class="text-slate-100">Halo, {{ auth()->user()->name }} !</span>
        @else
            <a href="{{ route('login') }}  ">Login</a>
        @endauth
    </nav>
    {{ $slot ?? '' }}
    @yield('content')
</body>
</html>
