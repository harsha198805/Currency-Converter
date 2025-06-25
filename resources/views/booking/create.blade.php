@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Booking</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
            @error('title')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="checkin_date" class="form-label">Check-in Date:</label>
                <input type="date" name="checkin_date" class="form-control" required value="{{ old('checkin_date') }}">
                @error('checkin_date')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="checkin_time" class="form-label">Check-in Time:</label>
                <input type="time" name="checkin_time" class="form-control" required value="{{ old('checkin_time') }}">
                @error('checkin_time')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="checkout_date" class="form-label">Checkout Date:</label>
                <input type="date" name="checkout_date" class="form-control" required value="{{ old('checkout_date') }}">
                @error('checkout_date')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="checkout_time" class="form-label">Checkout Time:</label>
                <input type="time" name="checkout_time" class="form-control" required value="{{ old('checkout_time') }}">
                @error('checkout_time')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount (USD):</label>
            <input type="number" name="amount" class="form-control" step="0.01" required value="{{ old('amount') }}">
            @error('amount')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Booking</button>
    </form>
</div>
@endsection
