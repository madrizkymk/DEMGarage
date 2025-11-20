<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user', 'services')->get();
        return view('user.bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::with('user', 'services')->findOrFail($id);
        return view('user.bookings.show', compact('booking'));
    }

    public function create()
    {
        return view('user.bookings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_date' => 'required|date',
            'vehicle_number' => 'required|string|max:255',
            'service_type' => 'required|in:minor service,major service,modification',
        ]);

        $booking = new Booking($validated);
        $booking->user_id = $request->user()->id;
        $booking->save();

        return redirect()->route('user.bookings.index')->with('success', 'Booking created successfully.');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('user.bookings.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'booking_date' => 'required|date',
            'vehicle_number' => 'required|string|max:255',
            'service_type' => 'required|in:minor service,major service,modification',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($validated);

        return redirect()->route('user.bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('user.bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
