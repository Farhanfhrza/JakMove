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
                    {{ __("You're logged in!") }}
                    <button class="bg-green-600 text-white px-4 py-2 rounded">
                        <a href="{{ route('choose.transport') }}">
                            Pesan Tiket
                        </a>
                    </button>
                    @if ($tickets->count() > 0)
                        <div class="grid gap-4">
                            @foreach ($tickets as $ticket)
                                <div class="p-4 border rounded shadow bg-white">
                                    <p><strong>Transportasi:</strong> {{ $ticket->transportType->name }}</p>
                                    <p><strong>Naik dari:</strong> {{ $ticket->pickupStop->name }}</p>
                                    <p><strong>Turun di:</strong> {{ $ticket->dropoffStop->name }}</p>
                                    <p><strong>Tanggal:</strong>
                                        {{ \Carbon\Carbon::parse($ticket->travel_date)->format('d M Y') }}</p>
                                    <p><strong>Status:</strong>
                                        <span
                                            class="px-2 py-1 rounded text-white text-sm {{ $ticket->status === 'booked' ? 'bg-blue-600' : ($ticket->status === 'used' ? 'bg-green-600' : 'bg-gray-400') }}">
                                            {{ ucfirst($ticket->status) }}
                                        </span>
                                    </p>
                                    <p><strong>Harga:</strong> Rp{{ number_format($ticket->price, 0, ',', '.') }}</p>
                                    <p><strong>Dipesan:</strong> {{ \Carbon\Carbon::parse($ticket->booked_at)->format('d M Y H:i') }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-600">Anda belum memiliki tiket.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
