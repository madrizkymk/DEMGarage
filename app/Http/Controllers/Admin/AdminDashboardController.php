<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = $this->getDashboardStats();

        return view('admin.dashboard', $stats);
    }

    /**
     * Get dashboard statistics
     *
     * @return array
     */
    private function getDashboardStats(): array
    {
        return [
            'totalBookings' => $this->getTotalBookings(),
            'completedServices' => $this->getCompletedServices(),
            'totalUsers' => $this->getTotalUsers(),
        ];
    }

    /**
     * Get total number of bookings
     *
     * @return int
     */
    private function getTotalBookings(): int
    {
        return Booking::count();
    }

    /**
     * Get total number of completed services
     *
     * @return int
     */
    private function getCompletedServices(): int
    {
        return Booking::where('status', 'Completed')->count();
    }

    /**
     * Get total number of users
     *
     * @return int
     */
    private function getTotalUsers(): int
    {
        return User::where('role', 'user')->count();
    }
}
