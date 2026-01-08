<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'user')
            ->orderBy('name', 'asc');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('phone_number', 'like', '%' . $search . '%');
            });
        }

        $users = $query->paginate(12);

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        // Ensure only admin can view user details
        if ($user->role !== 'user') {
            abort(404);
        }

        // Get user's bookings with pagination
        $bookings = $user->bookings()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.users.show', compact('user', 'bookings'));
    }
}
