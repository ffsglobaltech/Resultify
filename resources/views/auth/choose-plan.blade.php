@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Select a Plan</h2>
    <a href="{{ route('school.register', ['plan' => 'basic']) }}">Basic Plan</a>
    <a href="{{ route('school.register', ['plan' => 'premium']) }}">Premium Plan</a>
</div>
@endsection
