<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $items = Booking::where('user_id', Auth::id())
            ->where('status', 'Completed')
            ->orderBy('booking_date', 'desc')
            ->get();

        return view('user.history.index', compact('items'));
    }
}
