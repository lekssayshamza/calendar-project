<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900">

@include('layouts.navigation')


<main class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Welcome Message -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <p class="text-gray-900 dark:text-gray-100 text-lg">
                👋 Welcome back, {{ auth()->user()->name ?? 'User' }}! You're logged in.
            </p>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                <h3 class="text-gray-500 dark:text-gray-300 text-sm">Total Projects</h3>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalProjects }}</p>
            </div> --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                <h3 class="text-gray-500 dark:text-gray-300 text-sm">Upcoming Events</h3>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $upcomingEvents->count() }}</p>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                <h3 class="text-gray-500 dark:text-gray-300 text-sm">Tasks Completed</h3>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $tasksCompleted }}</p>
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">📅 Upcoming Events</h2>
            @if($upcomingEvents->isEmpty())
                <p class="text-gray-700 dark:text-gray-300">No upcoming events.</p>
            @else
                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300">
                    @foreach($upcomingEvents as $event)
                        <li><strong>{{ $event->start_time->format('F j') }}:</strong> {{ $event->title }}</li>
                    @endforeach

                </ul>
            @endif
        </div>

    </div>
</main>

</body>
</html>
