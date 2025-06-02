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
                    <form method="POST" action="{{ route('ticket.review') }}">
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
            
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Lanjut ke Pembayaran</button>
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
</x-app-layout>
