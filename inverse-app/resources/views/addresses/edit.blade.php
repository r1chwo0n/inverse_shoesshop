@extends('layouts.app')

@section('content')
<form action="{{ route('addresses.update', $address) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Add form fields with existing values here -->
    <button type="submit">Update Address</button>
</form>
@endsection
