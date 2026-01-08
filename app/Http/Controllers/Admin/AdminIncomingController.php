<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;   // atau Booked (sesuai model kamu)
use Illuminate\Http\Request;

class AdminIncomingController extends Controller
{
    public function index()
    {
    $items = Booking::with('user')   // <-- ini penting
        ->whereIn('status', ['Pending', 'In Progress'])
        ->orderBy('booking_date', 'asc')
        ->paginate(10);

    return view('admin.incoming.index', compact('items'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,In Progress,Completed'
        ], [
            'status.in' => 'Status harus salah satu dari: Pending, In Progress, atau Completed.',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
