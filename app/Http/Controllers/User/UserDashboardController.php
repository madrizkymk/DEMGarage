<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $stats = $this->getUserDashboardStats();

        return view('user.dashboard', $stats);
    }

    /**
     * Get user dashboard statistics
     *
     * @return array
     */
    private function getUserDashboardStats(): array
    {
        $userId = Auth::id();

        return [
            'bookings' => $this->getUserTotalBookings($userId),
            'activeBookings' => $this->getUserActiveBookings($userId),
            'completedServices' => $this->getUserCompletedServices($userId),
        ];
    }

    /**
     * Get total bookings for current user
     *
     * @param int $userId
     * @return int
     */
    private function getUserTotalBookings(int $userId): int
    {
        return Booking::where('user_id', $userId)->count();
    }

    /**
     * Get active bookings for current user
     *
     * @param int $userId
     * @return int
     */
    private function getUserActiveBookings(int $userId): int
    {
        return Booking::where('user_id', $userId)
            ->whereIn('status', ['Pending', 'In Progress'])
            ->count();
    }

    /**
     * Get completed services for current user
     *
     * @param int $userId
     * @return int
     */
    private function getUserCompletedServices(int $userId): int
    {
        return Booking::where('user_id', $userId)
            ->where('status', 'Completed')
            ->count();
    }
}
