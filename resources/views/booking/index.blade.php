@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">All Bookings</h2>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Check-in</th>
                <th>Checkout</th>
                <th>Amount (USD)</th>
                <th>Amount (LKR)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $index => $booking)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $booking->title }}</td>
                    <td>{{ $booking->checkin_date }} {{ \Carbon\Carbon::parse($booking->checkin_time)->format('h:i A') }}</td>
                    <td>{{ $booking->checkout_date }} {{ \Carbon\Carbon::parse($booking->checkout_time)->format('h:i A') }}</td>
                    <td>${{ number_format($booking->amount, 2) }}</td>
                    <td>Rs {{ number_format($booking->amount_lkr, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No bookings found.</td>
                </tr>
            @endforelse
        </tbody>

    </table>
        <div class="mt-3">
            {{ $bookings->links() }}
        </div>
    <a href="{{ route('bookings.create') }}" class="btn btn-primary">Add New Booking</a>
</div>
@endsection