@extends('layouts.app')

@push('styles')
    @vite('resources/css/edit-event.css')
@endpush

@section('content')
<div class="container">
    <h1>Edit Event</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Start Time</label>
            <input type="datetime-local" name="start_time" class="form-control" value="{{ old('start_time', date('Y-m-d\TH:i', strtotime($event->start_time))) }}" required>
        </div>

        <div class="mb-3">
            <label>End Time</label>
            <input type="datetime-local" name="end_time" class="form-control" value="{{ old('end_time', $event->end_time ? date('Y-m-d\TH:i', strtotime($event->end_time)) : '') }}">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="all_day" class="form-check-input" id="all_day" {{ old('all_day', $event->all_day) ? 'checked' : '' }}>
            <label class="form-check-label" for="all_day">All Day Event</label>
        </div>

        <div class="mt-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <select name="category" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">Choose category</option>
                <option value="work" {{ $event->category == 'work' ? 'selected' : '' }}>Work</option>
                <option value="personal" {{ $event->category == 'personal' ? 'selected' : '' }}>Personal</option>
                <option value="study" {{ $event->category == 'study' ? 'selected' : '' }}>Study</option>
                <option value="holiday" {{ $event->category == 'holiday' ? 'selected' : '' }}>Holiday</option>
            </select>
        </div>


        <div class="mb-3">
            <label>Color</label>
            <input type="color" name="color" class="form-control" value="{{ old('color', $event->color) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
@endsection
