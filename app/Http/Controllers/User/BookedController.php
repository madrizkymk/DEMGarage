<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookedController extends Controller
{
    // Tampilkan semua booking milik user (anggap ini halaman "Booked")
    public function index()
    {
        $bookedBookings = Booking::where('user_id', Auth::id())
            ->where('status', '!=', 'Completed')
            ->orderBy('booking_date', 'asc')
            ->get();

        return view('user.bookings.booked', compact('bookedBookings'));
    }

    // Hapus booking milik user
    public function destroy(Booking $booking)
    {
        // Pastikan user hanya boleh hapus booking miliknya sendiri
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        $booking->delete();

        return redirect()
            ->route('user.booked.index')
            ->with('success', 'Booking deleted successfully.');
    }
}
