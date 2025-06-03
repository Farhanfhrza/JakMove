@extends('layouts.mobile')

@section('content')
    <div class="flex flex-col h-screen bg-[#FFFEFE]">
        <!-- Header -->
        <div class="rounded-bl-3xl bg-[#ffce48] px-7 pt-6 pb-4">
            <h2 class="text-3xl text-white font-semibold mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                Choose Vehicle
            </h2>
        </div>

        <!-- Scrollable Ticket List -->
        <div class="flex-1 overflow-y-auto px-7 py-7 space-y-6">
            <!-- Active Tickets -->
            <div>
                <div class="flex mb-2 flex-col">
                    <a href="{{ route('mobile.choose.stops', 1) }}" class="text-blue-600">
                        <button class="flex justify-center items-center">
                            <div class="bg-[#1A1528] w-16 p-3 rounded-2xl mr-4">
                                <img src="{{ asset('img/bus-svgrepo-com.svg') }}" alt="">
                            </div>
                            <p class="text-2xl text-black">Trans Jakarta</p>
                        </button>
                    </a>
                    <hr class="my-4">
                    <a href="{{ route('mobile.choose.stops', 2) }}" class="text-blue-600">
                        <button class="flex justify-center items-center">
                            <div class="bg-[#1A1528] w-16 p-3 rounded-2xl mr-4">
                                <img src="{{ asset('img/train-station-mark-svgrepo-com.svg') }}" alt="">
                            </div>
                            <p class="text-2xl text-black">MRT</p>
                        </button>
                    </a>
                    <hr class="my-4">
                    <a href="{{ route('mobile.choose.stops', 3) }}" class="text-blue-600">
                        <button class="flex justify-center items-center">
                            <div class="bg-[#1A1528] w-16 p-3 rounded-2xl mr-4">
                                <img src="{{ asset('img/train-svgrepo-com.svg') }}" alt="">
                            </div>
                            <p class="text-2xl text-black">KRL</p>
                        </button>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
