@extends('layout.admin')

@section('css')
    <link href="{{ asset('css/paleta.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="red">
                            <h4 class="title">Novo Header</h4>
                        </div>
                        <div class="card-content">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{Form::open(['route' => ['storageHeader'], 'method' => 'post', 'files' => true])}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            {{Form::label('tm', 'Titulo Menor', ['class' => 'control-label'])}}
                                            {{Form::text(
                                                'titulo_menor',
                                                 old('titulo_menor'),
                                                 [
                                                    'required',
                                                    'maxlength' => 20,
                                                    'class' => 'form-control'
                                                 ]
                                                )}}
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group label-floating">
                                            {{Form::label('tm', 'Titulo Maior', ['class' => 'control-label'])}}
                                            {{Form::text(
                                                'titulo_maior',
                                                 old('titulo_maior'),
                                                 [
                                                    'required',
                                                    'maxlength' => 50,
                                                    'class' => 'form-control'
                                                 ]
                                                )}}
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <div class="form-group label-floating">
                                        {{Form::label('', 'Ativar Este')}}<br>
                                        {{Form::checkbox(
                                            'is_active', 1, null,
                                            [
                                                'class' => 'form-control'
                                            ]
                                        )}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" >
                                        <div class="form-group dropzone" style="border:2px dashed #9c27b0" >
                                            {{Form::label('', 'Solte a imagem aqui ou clique para selecionar os arquivos')}}
                                            {{Form::file('file', ['required' ,'class' => 'form-control'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row"  style="margin-bottom: 5%">

                                    <div class="col-md-4">

                                        <div class="form-group label-floating">

                                            {{Form::label('bt', 'Texto', ['class' => 'control-label'])}}
                                            {{Form::text(
                                                'btn_text',
                                                 old('btn_text'),
                                                 [
                                                    'required',
                                                    'maxlength' => 10,
                                                    'class' => 'form-control'
                                                 ]
                                                )}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            {{Form::label('bt', 'Cor', ['class' => 'control-label'])}}
                                            {{Form::text(
                                                'color',
                                                 '#',
                                                 [
                                                    'required',
                                                    'maxlength' => 10,
                                                    'class' => 'form-control',
                                                    'id' => 'color',
                                                    'onfocus'=> 'abrirPaleta()',
                                                    'onblur' => 'fecharPaleta()'
                                                 ]
                                                )}}
                                        </div>
                                    </div>
                                    <div id="picker" class="col-md-3" style="position: absolute; margin-left: 65%; z-index: 9"></div>
                                </div>

                                <a href="{{route('headerHome')}}" class="btn btn-primary pull-left">Voltar</a>
                                <button type="submit" class="btn btn-primary pull-right">Publicar Header</button>
                                <div class="clearfix"></div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/paleta.js')}}"></script>
    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
    <script>
        $(document).ready(function(){
            $('#picker').farbtastic('#color').hide();

        });

        function abrirPaleta(){

            $('#picker').fadeIn(500);

        }
        function fecharPaleta(){

            $('#picker').fadeOut(500);

        }



    </script>

@endsection