<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::latest()->paginate(10);
        $usdToLkrRate = 300;

        foreach ($bookings as $booking) {
            $booking->amount_lkr = $booking->amount * $usdToLkrRate;
        }

        return view('booking.index', compact('bookings'));
    }

    public function create()
    {
        return view('booking.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'checkin_date' => 'required|date',
            'checkin_time' => 'required',
            'checkout_date' => 'required|date',
            'checkout_time' => 'required',
            'amount' => 'required|numeric',
        ]);

        Booking::create([
            'title' => $request->title,
            'checkin_date' => $request->checkin_date,
            'checkin_time' => $request->checkin_time,
            'checkout_date' => $request->checkout_date,
            'checkout_time' => $request->checkout_time,
            'currency' => 'USD',
            'amount' => $request->amount,
        ]);

        return redirect()->route('bookings.create')->with('success', 'Booking added successfully!');
    }

    public function calendar()
    {
        $bookings = Booking::all();
        $usdToLkrRate = 300;

        $events = [];

        foreach ($bookings as $booking) {
            $events[] = [
                'title' => $booking->title . ' (Rs ' . ($booking->amount * $usdToLkrRate) . ')',
                'start' => $booking->checkin_date,
                'end' => \Carbon\Carbon::parse($booking->checkout_date)->addDay()->format('Y-m-d'), // make end inclusive
            ];
        }

        return view('booking.calendar', compact('events'));
    }
}
