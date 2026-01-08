<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class UpdateServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with('user')
            ->where('status', 'Completed')
            ->orderBy('booking_date', 'asc');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', '%' . $search . '%');
                })
                ->orWhere('vehicle_number', 'like', '%' . $search . '%')
                ->orWhere('service_type', 'like', '%' . $search . '%');
            });
        }

        $items = $query->paginate(10);

        return view('admin.update-service.index', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric|min:0|max:99999999',
            'description' => 'required|string|max:1000',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->price = $request->price;
        $booking->description = $request->description;
        $booking->save();

        return redirect()->back()->with('success', 'Service updated');
    }
}

