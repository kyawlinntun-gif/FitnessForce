<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $reminders = Reminder::query()
                    ->with(['lead'])
                    ->where('reminder_date', now()->format('Y-m-d'))
                    ->where('status', 'pending')
                    ->where('user_id', Auth::user()->id)
                    ->get();
        $data = [
            'reminders' => $reminders
        ];

        return Inertia::render('Dashboard/Index', $data);
    }
}
