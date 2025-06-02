<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use App\Mail\EventReminderMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendEventReminders extends Command
{
    protected $signature = 'events:send-reminders';

    protected $description = 'Send email reminders for events starting soon';

    public function handle()
    {
        $now = Carbon::now();
        $tomorrow = $now->copy()->addDay();

        // Find events starting between now and 24 hours from now
        $events = Event::whereBetween('start_time', [$now, $tomorrow])->get();

        foreach ($events as $event) {
            // TODO: Add logic to select the user(s) to notify here
            $user = $event->user; // assuming event belongs to user relationship

            if ($user && $user->email) {
                Mail::to($user->email)->send(new EventReminderMail($event));
                $this->info("Reminder sent for event ID {$event->id} to {$user->email}");
            }
        }

        return 0;
    }
}
