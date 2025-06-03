@extends('layouts.mobile')

@section('content')
    <div class="h-32 rounded-bl-3xl bg-[#ffce48] flex flex-col justify-center px-7">
        <h2 class="text-3xl text-white font-semibold mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">My Tickets</h2>
        <p class="text-xl">Buy tickets or see your existing ones.</p>
    </div>
    <div class="space-y-2 bg-[#FFFEFE] min-h-screen p-7 flex flex-col gap-4">
        <button class="bg-[#1A1528] text-[#FFFEFE] py-2 px-6 rounded-xl font-medium w-fit">
            <a href="">Buy Ticket</a>
        </button>
        <div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-8 mr-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                </svg>
                <h1 class="text-2xl font-semibold">Active tickets</h1>
            </div>
        </div>
        {{-- @foreach ($transportTypes as $type)
            <a href="{{ route('choose.stops', $type->id) }}" class="block p-4 bg-gray-100 rounded shadow">
                {{ $type->name }} - Rp{{ number_format($type->price, 0, ',', '.') }}
            </a>
        @endforeach --}}
    </div>
@endsection
