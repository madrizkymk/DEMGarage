<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user')->get();
        return view('user.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        $booking->load('user');
        return view('user.bookings.show', compact('booking'));
    }

    public function create()
    {
        return view('user.bookings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_date'    => 'required|date|after_or_equal:today',
            'vehicle_number'  => 'required|string|max:12|regex:/^[A-Z]{1,2} \d{1,4}( [A-Z]{1,3})?$/',
            'service_type'    => 'required|in:minor service,major service,modification',
        ], [
            'booking_date.required' => 'Tanggal booking wajib diisi.',
            'booking_date.after_or_equal' => 'Tanggal booking tidak boleh di masa lalu.',
            'vehicle_number.required' => 'Nomor kendaraan wajib diisi.',
            'vehicle_number.regex' => 'Format nomor kendaraan tidak valid (contoh: B 1234 AB atau B 123).',
            'service_type.required' => 'Jenis service wajib dipilih.',
            'service_type.in' => 'Jenis service tidak valid.',
        ]);

        $validated['user_id'] = $request->user()->id;

        Booking::create($validated);

        return redirect()
            ->route('user.bookings.index')
            ->with('success', 'Booking created successfully.');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('user.bookings.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'booking_date'    => 'required|date|after_or_equal:today',
            'vehicle_number'  => 'required|string|max:12|regex:/^[A-Z]{1,2} \d{1,4}( [A-Z]{1,3})?$/',
            'service_type'    => 'required|in:minor service,major service,modification',
        ], [
            'booking_date.required' => 'Tanggal booking wajib diisi.',
            'booking_date.after_or_equal' => 'Tanggal booking tidak boleh di masa lalu.',
            'vehicle_number.required' => 'Nomor kendaraan wajib diisi.',
            'vehicle_number.regex' => 'Format nomor kendaraan tidak valid (contoh: B 1234 AB atau B 123).',
            'service_type.required' => 'Jenis service wajib dipilih.',
            'service_type.in' => 'Jenis service tidak valid.',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($validated);

        return redirect()
            ->route('user.bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()
            ->route('user.bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }

    public function booked()
    {
        $bookedBookings = Booking::where('user_id', Auth::id())->get();

        return view('user.bookings.booked', compact('bookedBookings'));
    }
}
