@extends('layouts.app')

@section('sidebar')
    @include('includes.adminsidebar')
@endsection

@section('topbar')
    @include('includes.admintopbar')
@endsection

@section('content')
    @yield('admin-content')
@endsection
