@extends('layouts.mobile')

@section('content')
    <div class="flex flex-col h-screen bg-[#FFFEFE]">
        <!-- Header -->
        <div class="rounded-bl-3xl bg-[#ffce48] px-7 pt-6 pb-4">
            <h2 class="text-3xl text-white font-semibold mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                Payment
            </h2>
        </div>

        <!-- Scrollable Ticket List -->
        <div class="flex-1 overflow-y-auto px-7 py-7 space-y-6">
            <!-- Active Tickets -->
            <div>
                <div class="flex items-center mb-2">
                    <h1 class="text-2xl font-semibold">QRIS</h1>
                </div>
                <img src="{{ asset('img/QR.png') }}" alt="">
                <div>
                    <strong>Transportasi:</strong> {{ $transportType->name }}
                </div>
                <div>
                    <strong>Halte Naik:</strong> {{ $pickup->name }}
                </div>
                <div>
                    <strong>Halte Turun:</strong> {{ $dropoff->name }}
                </div>
                <div>
                    <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($travel_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                </div>
                <div>
                    <strong>Harga:</strong> Rp{{ number_format($price, 0, ',', '.') }}
                </div>
        
                <form action="{{ route('mobile.ticket.pay') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="transport_type_id" value="{{ $transportType->id }}">
                    <input type="hidden" name="pickup_id" value="{{ $pickup->id }}">
                    <input type="hidden" name="dropoff_id" value="{{ $dropoff->id }}">
                    <input type="hidden" name="travel_date" value="{{ $travel_date }}">
                    <input type="hidden" name="price" value="{{ $price }}">
        
                    <button type="submit" class="bg-[#1A1528] text-white px-4 py-4 rounded-xl w-full font-medium text-xl">
                        Let's Move
                    </button>
                </form>
            </div>

        </div>
    </div>
    <script>
        if (window.history && window.history.pushState) {
            window.history.pushState(null, "", window.location.href);
            window.onpopstate = function() {
                window.location.href = "{{ route('dashboard') }}";
            };
        }
    </script>
@endsection
