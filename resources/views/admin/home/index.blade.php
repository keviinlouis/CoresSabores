@extends('layout.admin')

@section('title', 'Index')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="title">Bem vindo!</h4>
                        <p class="category">Esse é Seu Site Atualmente</p>
                    </div>
                </div>
                <div class="card-content">
                    @include('admin.home.header')
                </div>
            </div>
        </div>
    </div>

@endsection