@extends('layout.master')

@section('import-css')
    <link href="{{ asset('css/agency-theme.min.css') }}" rel="stylesheet">

    @yield('css')

@endsection

@section('import-fonts')
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    @yield('fonts')

@endsection

@section('basic-content')
    @include('home.nav')
    @include('home.header')
    @include('home.servicos')
    @include('home.produtos')
    @include('home.sobre')
    @include('home.time')
    @include('home.clientes')
    @include('home.contato')
    @include('home.footer')
@endsection

@section('import-scripts')
    <script src="{{asset(('js/agency-theme.min.js'))}}"></script>
    <script src="{{asset(('js/jqBootstrapValidation.js'))}}"></script>
    <script src="{{asset(('js/contact_me.js'))}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    @yield('scripts')

@endsection