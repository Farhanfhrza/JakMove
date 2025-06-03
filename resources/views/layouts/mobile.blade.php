<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'JakMove Mobile' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-900 max-w-lg m-auto bg-black">

    {{-- Header Mobile --}}
    <header
        class="py-4 px-7 z-10 bg-[#ffce48] text-white text-center text-lg font-bold flex justify-between items-center">
        {{-- {{ $title ?? 'JakMove' }} --}}
        <img src="{{ asset('img/Logo.png') }}" alt="" class="object-contain h-10">
        <img src="{{ asset('img/profile-pic.jpg') }}" alt="" class="aspect-square rounded-full w-16">
    </header>

    {{-- Isi Konten --}}
    <main class="bg-white min-h-screen">
        @yield('content')
    </main>

    {{-- Navigasi Bawah --}}
    <nav
        class="fixed bottom-4 inset-x-0 mx-auto bg-white drop-shadow-xl flex justify-around text-sm py-2 max-w-md rounded-full">
        <a href="" class="flex items-center flex-col">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-8 fill-[#FF8811] mb-1">
                <path
                    d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                <path
                    d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
            </svg>
            <div>Home</div>
        </a>
        <a href="" class="flex items-center flex-col">
            <img src="{{ asset('img/nav-logo.png') }}" alt="" class="mb-1 h-8">
            <div>Tiket</div>
        </a>
        <a href="" class="flex items-center flex-col">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 mb-1">
                <path fill-rule="evenodd"
                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                    clip-rule="evenodd" />
            </svg>
            <div>Profil</div>
        </a>
    </nav>

    <div class="h-16 bg-white"></div> {{-- Spacer agar konten tidak tertutup nav bawah --}}
</body>

</html>
