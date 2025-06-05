@extends('layouts.app')

@push('styles')
    @vite('resources/css/calendar.css')
@endpush

@section('content')
<div class="container">
    <h1>Event Calendar</h1>

    <div>
        <input type="text" id="search" placeholder="Search events...">
    </div>

    <div id="calendar"></div>
</div>


<!-- Include FullCalendar CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var allEvents = @json($calendarEvents);

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            height: 'auto',  // <-- Add this to auto-adjust height and avoid scroll
            editable: true,
            events: allEvents,
            eventColor: '#378006',

            headerToolbar: {
                left: 'prev,next today',       // navigation buttons
                center: 'title',               // calendar title
                right: 'dayGridDay,dayGridWeek,dayGridMonth,listView'  // added listView button
            },

            customButtons: {
                listView: {
                    text: 'List of Events',
                    click: function () {
                        window.location.href = '/events'; // or route('events.index') if using Laravel routing
                    }
                }
            },

            eventDidMount: function(info) {
                if(info.event.extendedProps.color) {
                    info.el.style.backgroundColor = info.event.extendedProps.color;
                }

                // Show the category as a tooltip
                if (info.event.extendedProps.category) {
                    info.el.setAttribute('title', `Category: ${info.event.extendedProps.category}`);
                }
            },

            eventClick: function(info) {
                var eventId = info.event.id;
                if(eventId) {
                    window.location.href = '/events/' + eventId;
                }
            },

            dateClick: function(info) {
                var clickedDate = info.dateStr;
                window.location.href = '/events/create?date=' + clickedDate;
            },

            eventDrop: function(info) {
                var eventId = info.event.id;
                var newStart = info.event.start.toISOString();
                var newEnd = info.event.end ? info.event.end.toISOString() : null;

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch('/events/' + eventId, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify({
                        start_time: newStart,
                        end_time: newEnd,
                    })
                })
                .then(response => {
                    if (!response.ok) throw new Error('Failed to update event');
                    showToast('Event updated successfully');  // nicer toast instead of alert
                })
                .catch(error => {
                    showToast('Error updating event: ' + error.message, true);  // red toast for errors
                    info.revert();
                });
            }
        });

        function showToast(message, isError = false) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.style.backgroundColor = isError ? '#E74C3C' : '#4BB543'; // red for errors, green for success
            toast.style.display = 'block';

            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000); // hide after 3 seconds automatically
        }

        // Search filter listener
        document.getElementById('search').addEventListener('input', function(e) {
            var query = e.target.value.toLowerCase();
            var filteredEvents = allEvents.filter(function(event) {
                return event.title.toLowerCase().includes(query);
            });
            calendar.removeAllEvents();
            calendar.addEventSource(filteredEvents);
        });

        calendar.render();
    });
</script>
@endsection