<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

class UserCalendarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $user = null;
        $events = collect();

        if ($search) {
            $user = User::where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->first();

            if ($user) {
                $events = Event::where('user_id', $user->id)->orderBy('start_time')->get();
            }
        }

        return view('usercalendar.index', compact('user', 'events', 'search'));
    }
}
