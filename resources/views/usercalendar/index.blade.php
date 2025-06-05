<!DOCTYPE html>
<html>
<head>
    <title>View User Calendar</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 40px auto;
            max-width: 700px;
            background: #f9f9f9;
            color: #333;
        }

        h1 {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 30px;
            text-align: center;
        }

        form {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            justify-content: center;
        }

        input[type="text"] {
            padding: 10px 15px;
            font-size: 1rem;
            border: 2px solid #ddd;
            border-radius: 6px;
            width: 100%;
            max-width: 350px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }

        button {
            background-color: #3498db;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        h2 {
            font-weight: 600;
            color: #34495e;
            border-bottom: 2px solid #3498db;
            padding-bottom: 8px;
            margin-bottom: 20px;
        }

        .event {
            background: white;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }

        .event:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        .event-time {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 6px;
        }

        .event-title {
            font-size: 1.1rem;
            color: #555;
        }

        p {
            text-align: center;
            font-style: italic;
            color: #888;
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <h1>View Other User's Calendar</h1>

    <form method="GET" action="{{ route('usercalendar.index') }}">
        <input type="text" name="search" placeholder="Search user by name or email" value="{{ old('search', $search) }}">
        <button type="submit">Search</button>
    </form>

    @if($search)
        @if($user)
            <h2>Calendar of {{ $user->name }} ({{ $user->email }})</h2>

            @if($events->isEmpty())
                <p>No events found for this user.</p>
            @else
                @foreach($events as $event)
                    <div class="event">
                        <div class="event-time">{{ \Carbon\Carbon::parse($event->start_time)->format('M d, Y H:i') }}</div>
                        <div class="event-title">{{ $event->title ?? 'Untitled Event' }}</div>
                    </div>
                @endforeach
            @endif

        @else
            <p>No user found matching "{{ $search }}".</p>
        @endif
    @endif

    <div style="text-align: center; margin-top: 40px;">
        <a href="{{ route('events.calendar') }}" 
        style="
            display: inline-block;
            padding: 10px 25px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            font-weight: 600;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        "
        onmouseover="this.style.backgroundColor='#2980b9'"
        onmouseout="this.style.backgroundColor='#3498db'">
        ← Back to My Calendar
        </a>
    </div>
</body>
</html>
