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
                    <div><strong>Jenis Transportasi:</strong> {{ $transportType->name }}</div>
                    <div><strong>Tanggal Perjalanan:</strong>
                        {{ \Carbon\Carbon::parse($request->travel_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                    </div>
                    <div><strong>Naik dari:</strong> {{ $pickup->name }}</div>
                    <div><strong>Turun di:</strong> {{ $dropoff->name }}</div>
                    <div><strong>Harga:</strong> Rp{{ number_format($price, 0, ',', '.') }}</div>

                    <form action="#" method="POST">
                        @csrf
                        <!-- Tambahkan form pembelian atau pembayaran di sini -->
                        <button class="bg-green-600 text-white px-4 py-2 rounded">Bayar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
