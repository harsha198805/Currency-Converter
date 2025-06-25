@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Booking Calendar</h2>
    <div id="calendar"></div>
</div>
@endsection

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let calendarEl = document.getElementById('calendar');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 650,
                events: @json($events),
                eventColor: '#28a745',
                eventTextColor: '#ffffff',
            });

            calendar.render();
        });
    </script>
@endsection
  
