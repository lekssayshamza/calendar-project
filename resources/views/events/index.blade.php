@extends('layouts.app')

@push('styles')
    @vite('resources/css/events.css')
@endpush

@section('content')
<div class="container">
    <h1>All Events</h1>

    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create New Event</a>
    <a href="{{ route('events.calendar') }}" class="btn btn-primary mb-3">View Calendar</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Start</th>
                <th>End</th>
                <th>All Day</th>
                <th>Color</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->category }}</td>
                    <td>{{ $event->start_time }}</td>
                    <td>{{ $event->end_time }}</td>
                    <td>{{ $event->all_day ? 'Yes' : 'No' }}</td>
                    <td><span style="background-color: {{ $event->color }}; padding: 5px 10px;">&nbsp;</span></td>
                    <td>
                        <a href="{{ route('events.show', $event) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
