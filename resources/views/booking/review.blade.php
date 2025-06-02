<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
            
                    <form action="{{ route('ticket.pay') }}" method="POST">
                        @csrf
                        <input type="hidden" name="transport_type_id" value="{{ $transportType->id }}">
                        <input type="hidden" name="pickup_id" value="{{ $pickup->id }}">
                        <input type="hidden" name="dropoff_id" value="{{ $dropoff->id }}">
                        <input type="hidden" name="travel_date" value="{{ $travel_date }}">
                        <input type="hidden" name="price" value="{{ $price }}">
            
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
                            Bayar & Pesan Tiket
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        if (window.history && window.history.pushState) {
            window.history.pushState(null, "", window.location.href);
            window.onpopstate = function () {
                window.location.href = "{{ route('dashboard') }}";
            };
        }
    </script>
    
</x-app-layout>