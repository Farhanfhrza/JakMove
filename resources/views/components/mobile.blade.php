<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'JakMove Mobile' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-900">

    {{-- Header Mobile --}}
    <header class="p-4 bg-blue-600 text-white text-center text-lg font-bold">
        {{ $title ?? 'JakMove' }}
    </header>

    {{-- Isi Konten --}}
    <main class="p-4">
        @yield('content')
    </main>

    {{-- Navigasi Bawah --}}
    <nav class="fixed bottom-0 left-0 right-0 bg-white border-t shadow flex justify-around text-sm py-2">
        <a href="{{ route('dashboard') }}" class="text-center">
            <div>🏠</div>
            <div>Home</div>
        </a>
        <a href="{{ route('choose-transport') }}" class="text-center">
            <div>🚌</div>
            <div>Tiket</div>
        </a>
        <a href="{{ route('profile') }}" class="text-center">
            <div>👤</div>
            <div>Profil</div>
        </a>
    </nav>

    <div class="h-16"></div> {{-- Spacer agar konten tidak tertutup nav bawah --}}
</body>
</html>
