@extends('layouts.mobile')

@section('content')
    <div class="flex flex-col h-screen bg-[#FFFEFE]">
        <!-- Header -->
        <div class="rounded-bl-3xl bg-[#ffce48] px-7 pt-6 pb-4">
            <h2 class="text-3xl text-white font-semibold mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                Choose Stops
            </h2>
        </div>

        <!-- Scrollable Ticket List -->
        <div class="flex-1 overflow-y-auto px-7 py-7 space-y-6">
            <!-- Active Tickets -->
            <div>
                <div class="flex items-center mb-2 w-full">
                    <form method="POST" action="{{ route('mobile.ticket.review') }}" class="w-full">
                        @csrf

                        <input type="hidden" name="transport_type_id" value="{{ $type->id }}">

                        <!-- Tanggal -->
                        <div class="mb-4">
                            <label for="travel_date">Tanggal Perjalanan</label>
                            <select name="travel_date" id="travel_date" class="w-full mt-1">
                                @for ($i = 0; $i < 7; $i++)
                                    <option value="{{ \Carbon\Carbon::now()->addDays($i)->format('Y-m-d') }}">
                                        {{ \Carbon\Carbon::now()->addDays($i)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <!-- Halte Naik -->
                        <div class="mb-4">
                            <label for="pickup">Halte Naik</label>
                            <select name="pickup" id="pickup" class="w-full mt-1">
                                <option value="">-- Pilih --</option>
                                @foreach ($stops as $stop)
                                    <option value="{{ $stop->id }}">{{ $stop->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Halte Turun -->
                        <div class="mb-4">
                            <label for="dropoff">Halte Turun</label>
                            <select name="dropoff" id="dropoff" class="w-full mt-1">
                                <option value="">-- Pilih --</option>
                                @foreach ($stops as $stop)
                                    <option value="{{ $stop->id }}">{{ $stop->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Harga -->
                        <div class="mb-4 text-lg">
                            <strong>Harga:</strong> <span id="price-display">Rp0</span>
                            <input type="hidden" name="price" id="price" value="0">
                        </div>

                        <div id="error-message" class="text-red-600 mb-4" style="display: none;"></div>

                        <button type="submit" class="bg-[#1A1528] text-white px-4 py-4 rounded-xl w-full font-medium text-xl">Go To Payment</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        const priceMap = @json($prices);
        const pickupSelect = document.getElementById('pickup');
        const dropoffSelect = document.getElementById('dropoff');
        const priceDisplay = document.getElementById('price-display');
        const priceInput = document.getElementById('price');
        const errorMessage = document.getElementById('error-message');

        function updatePrice() {
            const pickup = pickupSelect.value;
            const dropoff = dropoffSelect.value;

            if (!pickup || !dropoff) {
                priceDisplay.textContent = 'Rp0';
                priceInput.value = 0;
                errorMessage.style.display = 'none';
                return;
            }

            if (pickup === dropoff) {
                priceDisplay.textContent = 'Rp0';
                priceInput.value = 0;
                errorMessage.textContent = 'Halte naik dan turun tidak boleh sama.';
                errorMessage.style.display = 'block';
                return;
            }

            const match = priceMap.find(p =>
                (p.origin_id == pickup && p.destination_id == dropoff)
            );

            if (match) {
                const formatted = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(match.price);

                priceDisplay.textContent = formatted;
                priceInput.value = match.price;
                errorMessage.style.display = 'none';
            } else {
                priceDisplay.textContent = 'Tidak tersedia';
                priceInput.value = 0;
                errorMessage.textContent = 'Harga untuk rute ini tidak ditemukan.';
                errorMessage.style.display = 'block';
            }
        }

        pickupSelect.addEventListener('change', updatePrice);
        dropoffSelect.addEventListener('change', updatePrice);
    </script>
@endsection
