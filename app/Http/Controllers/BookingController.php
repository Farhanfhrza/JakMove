<?php

namespace App\Http\Controllers;

use id;
use App\Models\Stop;
use App\Models\Route;
use App\Models\Ticket;
use App\Models\Vehicle;
use App\Models\RouteStop;
use App\Models\RoutePrice;
use Illuminate\Http\Request;
use App\Models\TransportType;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function chooseTransport()
    {
        $types = TransportType::all();
        return view('booking.choose-transport', compact('types'));
    }

    public function chooseStops($transportType)
    {
        $type = TransportType::findOrFail($transportType);

        $vehicles = Vehicle::where('transport_type_id', $type->id)->pluck('id');
        $routes = Route::whereIn('vehicle_id', $vehicles)->where('is_active', true)->pluck('id');
        $stopIds = RouteStop::whereIn('route_id', $routes)->pluck('stop_id')->unique();
        $stops = Stop::whereIn('id', $stopIds)->get();

        // Ambil harga antar stop
        $prices = RoutePrice::whereIn('route_id', $routes)->get()->map(function ($p) {
            return [
                'origin_id' => $p->origin_stop_id,
                'destination_id' => $p->destination_stop_id,
                'price' => $p->price,
            ];
        });

        return view('booking.choose-stops', compact('type', 'stops', 'prices'));
    }

    public function reviewTicket(Request $request)
    {
        $validated = $request->validate([
            'transport_type_id' => 'required|exists:transport_types,id',
            'pickup' => 'required|exists:stops,id',
            'dropoff' => 'required|exists:stops,id|different:pickup',
            'travel_date' => 'required|date|after_or_equal:today',
            'price' => 'required|numeric|min:0',
        ]);

        $pickup = Stop::find($validated['pickup']);
        $dropoff = Stop::find($validated['dropoff']);
        $transportType = TransportType::find($validated['transport_type_id']);

        return view('booking.review', [
            'pickup' => $pickup,
            'dropoff' => $dropoff,
            'transportType' => $transportType,
            'travel_date' => $validated['travel_date'],
            'price' => $validated['price']
        ]);
    }

    public function payTicket(Request $request)
    {
        $validated = $request->validate([
            'transport_type_id' => 'required|exists:transport_types,id',
            'pickup_id' => 'required|exists:stops,id',
            'dropoff_id' => 'required|exists:stops,id|different:pickup_id',
            'travel_date' => 'required|date|after_or_equal:today',
            'price' => 'required|numeric|min:0',
        ]);

        $ticket = Ticket::create([
            'user_id' => auth()->id(),
            'transport_type_id' => $validated['transport_type_id'],
            'pickup_stop_id' => $validated['pickup_id'],
            'dropoff_stop_id' => $validated['dropoff_id'],
            'travel_date' => $validated['travel_date'],
            'status' => 'booked',
            'booked_at' => now(),
            'price' => $validated['price'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Tiket berhasil dipesan!');
    }

    public function dashboard()
    {
        $tickets = auth()->user()->tickets;
        return view('dashboard', compact('tickets'));
    }

}
