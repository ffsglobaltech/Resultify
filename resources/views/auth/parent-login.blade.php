@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Parent Login</h2>
    <form action="{{ route('parent.login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>
@endsection
