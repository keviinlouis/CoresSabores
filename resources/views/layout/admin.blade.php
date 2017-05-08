@extends('layout.master')

@section('import-css')
    <title>Admin - C&S</title>
    <link href="{{ asset('css/material-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet">

    @yield('css')

@endsection

@section('import-fonts')
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    @yield('fonts')

@endsection

@section('basic-content')
    <div class="wrapper">
        @include('admin.sidebar')
        <div class="main-panel">
            @include('admin.nav')

            @yield('content')



        </div>
    </div>
@endsection

@section('import-scripts')
    <script src="{{asset(('js/material.js'))}}"></script>
    <script src="{{asset(('js/material-dashboard.js'))}}"></script>
    <script src="{{asset(('js/chartist.js'))}}"></script>
    <script src="{{asset(('js/jquery.sharrre.js'))}}"></script>

    @yield('scripts')

@endsection