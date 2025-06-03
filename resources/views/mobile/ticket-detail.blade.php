@extends('layouts.mobile')

@section('content')
<div class="flex flex-col h-screen bg-[#FFFEFE]">
    <!-- Header -->
    <div class="rounded-bl-3xl bg-[#ffce48] px-7 pt-6 pb-4">
        <h2 class="text-3xl text-white font-semibold mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
            Ticket Detail
        </h2>
    </div>

    <div class="flex-1 overflow-y-auto px-7 py-6 space-y-4">
        <div class="flex items-center mb-2">
            <h1 class="text-2xl font-semibold">Ticket QR</h1>
        </div>
        <img src="{{ asset('img/ticket-qr.png') }}" alt="" class="m-auto h-80 border-4 rounded-lg">
        <div class="p-4 border rounded shadow bg-white space-y-2">
            <p><strong>Transportasi:</strong> {{ $ticket->transportType->name }}</p>
            <p><strong>Naik dari:</strong> {{ $ticket->pickupStop->name }}</p>
            <p><strong>Turun di:</strong> {{ $ticket->dropoffStop->name }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($ticket->travel_date)->format('d M Y') }}</p>
            <p><strong>Status:</strong>
                <span class="px-2 py-1 rounded text-white text-sm {{ $ticket->status === 'booked' ? 'bg-blue-600' : ($ticket->status === 'used' ? 'bg-green-600' : 'bg-gray-400') }}">
                    {{ ucfirst($ticket->status) }}
                </span>
            </p>
            <p><strong>Harga:</strong> Rp{{ number_format($ticket->price, 0, ',', '.') }}</p>
            <p><strong>Dipesan pada:</strong> {{ \Carbon\Carbon::parse($ticket->booked_at)->format('d M Y H:i') }}</p>
        </div>

        <a href="{{ route('mobile.dashboard') }}" class="block text-center bg-[#1A1528] text-white py-2 rounded-xl mt-4">
            Kembali ke Daftar Tiket
        </a>
    </div>
</div>
@endsection
