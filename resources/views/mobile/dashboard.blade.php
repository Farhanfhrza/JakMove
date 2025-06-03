@extends('layouts.mobile')

@section('content')
    <div class="flex flex-col h-screen bg-[#FFFEFE]">
        <!-- Header -->
        <div class="rounded-bl-3xl bg-[#ffce48] px-7 pt-6 pb-4">
            <h2 class="text-3xl text-white font-semibold mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                My Tickets
            </h2>
            <p class="text-xl">Buy tickets or see your existing ones.</p>
        </div>

        <!-- Buy Ticket Button -->
        <div class="px-7 py-4 bg-[#FFFEFE]">
            <button class="bg-[#1A1528] text-[#FFFEFE] py-2 px-6 rounded-xl font-medium w-fit">
                <a href="{{ route('mobile.choose.transport') }}">Buy Ticket</a>
            </button>
        </div>

        <!-- Scrollable Ticket List -->
        <div class="flex-1 overflow-y-auto px-7 pb-7 space-y-6">
            <!-- Active Tickets -->
            <div>
                <div class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-8 mr-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                    </svg>
                    <h1 class="text-2xl font-semibold">Active tickets</h1>
                </div>
                @if ($tickets->where('status', 'booked')->count() > 0)
                    <div class="grid gap-4">
                        @foreach ($tickets->where('status', 'booked') as $ticket)
                            <a href="{{ route('mobile.ticket.detail', $ticket->id) }}"
                                class="block p-4 border rounded shadow bg-white hover:bg-gray-100 transition">
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
                                <p><strong>Dipesan:</strong>
                                    {{ \Carbon\Carbon::parse($ticket->booked_at)->format('d M Y H:i') }}</p>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600">Tidak ada tiket aktif.</p>
                @endif
            </div>

            <!-- Previous Tickets -->
            <div>
                <div class="flex items-center mb-2 mt-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-8 mr-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h1 class="text-2xl font-semibold">Previous tickets</h1>
                </div>
                @if ($tickets->whereIn('status', ['used', 'expired'])->count() > 0)
                    <div class="grid gap-4">
                        @foreach ($tickets->whereIn('status', ['used', 'expired']) as $ticket)
                            <a href="{{ route('mobile.ticket.detail', $ticket->id) }}"
                                class="block p-4 border rounded shadow bg-white hover:bg-gray-100 transition">
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
                                <p><strong>Dipesan:</strong>
                                    {{ \Carbon\Carbon::parse($ticket->booked_at)->format('d M Y H:i') }}</p>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600">Belum ada tiket sebelumnya.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
