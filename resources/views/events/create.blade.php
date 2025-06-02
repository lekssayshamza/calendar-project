@extends('layouts.app')

@push('styles')
    @vite('resources/css/create-event.css')
@endpush

@section('content')
<div class="container">
    <h1>Create New Event</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.store') }}" method="POST">
        @csrf

        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label>Start Time:</label>
            <input type="datetime-local" name="start_time" value="{{ request('date') ? request('date').'T00:00' : '' }}" required>
        </div>

        <div>
            <label>End Time:</label>
            <input type="datetime-local" name="end_time" value="{{ request('date') ? request('date').'T00:00' : '' }}" required>
        </div>

        <div>
            <label>All Day:</label>
            <input type="checkbox" name="all_day" value="1" {{ old('all_day') ? 'checked' : '' }}>
        </div>

        <div>
            <label>Color:</label>
            <input type="color" name="color" value="{{ old('color', '#000000') }}">
        </div>

        <button type="submit">Create Event</button>
    </form>
</div>
@endsection
