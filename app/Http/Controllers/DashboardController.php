<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Event;  // Assuming you have an Event model
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {

        $this->updateEventStatuses();

        // Fetch upcoming events, projects count, tasks completed, recent activity
        $upcomingEvents = Event::where('start_time', '>=', now())
                                ->orderBy('start_time', 'asc')
                                ->take(5)
                                ->get();

        // $totalProjects = Project::count();

        $tasksCompleted = Event::where('status', 'completed')->count();

        // Pass data to the view
        return view('dashboard', compact('upcomingEvents', 'tasksCompleted'));
    }

    public function updateEventStatuses()
    {
        // Update all events with end_time before now and status not completed yet
        Event::where('end_time', '<', Carbon::now())
            ->where('status', '!=', 'completed')
            ->update(['status' => 'completed']);
    }
}
