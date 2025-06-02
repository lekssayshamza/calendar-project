<!DOCTYPE html>
<html>
<head>
    <title>Event Reminder</title>
</head>
<body>
    <h1>Reminder: Upcoming Event</h1>
    <p>Dear {{ $event->user->name ?? 'User' }},</p>

    <p>This is a reminder that your event "<strong>{{ $event->title }}</strong>" is coming up soon.</p>

    <p><strong>Start Time:</strong> {{ $event->start_time->format('F j, Y, g:i A') }}</p>

    @if($event->end_time)
        <p><strong>End Time:</strong> {{ $event->end_time->format('F j, Y, g:i A') }}</p>
    @endif

    @if($event->description)
        <p><strong>Description:</strong></p>
        <p>{{ $event->description }}</p>
    @endif

    <p>Thank you!</p>
</body>
</html>
