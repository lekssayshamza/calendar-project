@extends('layouts.app')

@push('styles')
    @vite('resources/css/show-event.css')
@endpush

@section('content')
<div class="container">
    <h1>{{ $event->title }}</h1>
    <p><strong>Description:</strong> {{ $event->description ?? 'N/A' }}</p>
    <p><strong>Start Time:</strong> {{ $event->start_time }}</p>
    <p><strong>End Time:</strong> {{ $event->end_time ?? 'N/A' }}</p>
    <p><strong>All Day:</strong> {{ $event->all_day ? 'Yes' : 'No' }}</p>

    <p><strong>Category:</strong> {{ $event->category }}</p>

    <p><strong>Color:</strong> <span style="background-color: {{ $event->color }}; padding: 5px 15px;">&nbsp;</span></p>

    <div style="display: flex; gap: 10px; margin-bottom: 20px;">
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>

        <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('events.destroy', $event) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" style="background-color: red; color: white;">Delete</button>
        </form>
    </div>
</div>
@endsection
