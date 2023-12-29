@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Calendar</li>
  </ol>
  <h1 class="page-title">Profile</h1>
</div>
@endsection