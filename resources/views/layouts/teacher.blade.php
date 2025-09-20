@extends('layouts.app')

@section('sidebar')
    @include('includes.teachersidebar')
@endsection

@section('topbar')
    @include('includes.teachertopbar')
@endsection

@section('content')
    @yield('teacher-content')
@endsection
