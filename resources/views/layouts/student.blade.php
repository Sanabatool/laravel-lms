@extends('layouts.app')

@section('topbar')
    @include('includes.studenttopbar')
@endsection

@section('content')
    @yield('student-content')
@endsection
