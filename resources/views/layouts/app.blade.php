<!DOCTYPE html>
<html>
<head>
    <title>Booking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
    @yield('head')
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="#">Booking System</a>
            <a href="{{ route('bookings.create') }}" class="btn btn-success">Booking Create</a>
            <a href="{{ route('bookings.calendar') }}" class="btn btn-success">Calendar View</a>
            <a href="{{ route('bookings.index') }}" class="btn btn-success">Table View</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>

    @yield('scripts')
</body>
</html>
