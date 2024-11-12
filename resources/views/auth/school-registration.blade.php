@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Register Your School - Plan: {{ $plan }}</h2>
    <form action="{{ route('school.register') }}" method="POST">
        @csrf
        <!-- School Information -->
        <div class="form-group">
            <label for="school_name">School Name</label>
            <input type="text" name="school_name" id="school_name" class="form-control" placeholder="Enter School Name" required>
        </div>

        <div class="form-group">
            <label for="short_name">Short Name (e.g., ffs)</label>
            <input type="text" name="short_name" id="short_name" class="form-control" placeholder="Enter Short Name" required>
            <small class="form-text text-muted">This short name will be used for your subdomain (e.g., shortname.systemdomain.com)</small>
        </div>

        <div class="form-group">
            <label for="address">School Address</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="Enter School Address" required>
        </div>

        <div class="form-group">
            <label for="phone">Contact Phone Number</label>
            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter Contact Phone" required>
        </div>

        <div class="form-group">
            <label for="email">School Email Address</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter School Email" required>
        </div>

        <!-- Contact Person Information -->
        <div class="form-group">
            <label for="principal_name">Principal or Contact Person's Name</label>
            <input type="text" name="principal_name" id="principal_name" class="form-control" placeholder="Enter Name of Principal or Contact Person" required>
        </div>

        <div class="form-group">
            <label for="principal_email">Principal or Contact Person's Email</label>
            <input type="email" name="principal_email" id="principal_email" class="form-control" placeholder="Enter Contact Person's Email" required>
        </div>

        <!-- Plan Selection -->
        <input type="hidden" name="plan" value="{{ $plan }}">

        <!-- Authentication -->
        <div class="form-group">
            <label for="password">Create Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Create Password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
        </div>

        <button type="submit" class="btn btn-primary">Register School</button>
    </form>
</div>
@endsection
