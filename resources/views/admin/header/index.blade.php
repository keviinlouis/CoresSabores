@extends('layout.admin')

@section('title', 'Headers')

@section('nav-buttons')

    <a href="{{route('newHeader')}}" class="btn btn-success pull-right"><i class="material-icons">add_circle_outline</i> Novo Header</a>

@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="title">Header Ativo</h4>
                        </div>

                        <div class="card-content">
                            @if(!$header_active == null)
                            <p><b>Titulo Menor:</b> {{$header_active->title}}</p>
                            <p><b>Titulo Maior:</b> {{$header_active->subtitle}}</p><br>
                            <p><b>Botao:</b> <a href="" onclick="event.preventDefault()" class=" btn btn-xl" style="background-color: {{$header_active->button_color}}; border-color: {{$header_active->button_color}}">{{$header_active->button_text}}</a> </p><br>
                            <p><b>Background:</b></p>
                            @if(!file_exists(asset('/imgs/'.$header_active->path.'/'.$header_active->foto_id.".".$header_active->format)))
                                <img src="{{asset('/imgs/'.$header_active->path.'/'.$header_active->foto_id.".".$header_active->format)}}"><br><br>
                            @else
                                <img src="{{asset('/imgs/'.$header_active->path.'/default.jpg')}}"><br><br>
                            @endif
                            <div class="td-actions text-right">
                            {{Form::open(['route' => ['editHeader', $header_active->id], 'method' => 'post'])}}
                            <button rel="tooltip" title="Editar" class="btn btn-primary btn-simple btn-xs pull-right "> <i class="material-icons" style="font-size:30px">create</i></button>
                            {{Form::close()}}

                            {{Form::open(['route' => ['deleteHeader', $header_active->id], 'method' => 'delete'])}}
                            <button rel="tooltip" title="Deletar" class="btn btn-danger btn-simple btn-xs pull-right" onclick="return confirm('Deseja mesmo Excluir?')"><i class="material-icons" style="font-size:30px">delete</i></button>
                            {{Form::close()}}
                            </div>
                            @else
                                <div class="alert alert-warning" style="background: #f44336;" role="alert">
                                    <strong>Ops!</strong> Infelizmente não há um Header Ativo
                                </div>
                                @if(count($headers) > 0)
                                    <p>Porfavor, ative um dos headers abaixo</p><br>
                                @else
                                    <p>Porfavor, crie e ative um header</p>

                                    <div class="td-actions text-right">
                                        <a href="{{route('newHeader')}}" rel="tooltip" title="Criar" class="btn btn-success btn-simple btn-xs pull-left">
                                            <i class="material-icons" style="font-size: 30px">add_circle_outline</i>
                                        </a>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title">Header Existentes</h4>
                        </div>
                        <div class="card-content">
                            @if(count($headers) > 0)
                            @foreach($headers as $header)
                                <div class="card">
                                    <div class="card-content">
                                        <p><b>Titulo Menor:</b> {{$header->title}}</p>
                                        <p><b>Titulo Maior:</b> {{$header->subtitle}}</p><br>
                                        <p><b>Botao:</b> <a href="" onclick="event.preventDefault()" class=" btn btn-xl" style="background-color: {{$header->button_color}}; border-color: {{$header->button_color}}">{{$header->button_text}}</a> </p><br>
                                        <p><b>Background:</b></p>
                                        @if(!file_exists(asset('/imgs/'.$header->path.'/'.$header->foto_id.".".$header->format)))
                                             <img src="{{asset('/imgs/'.$header->path.'/'.$header->foto_id.".".$header->format)}}"><br><br>
                                        @else
                                            <img src="{{asset('/imgs/'.$header->path.'/default.jpg')}}"><br><br>
                                        @endif
                                        <div class="td-actions text-right">
                                            {{Form::open(['route' => ['activeHeader', $header->id], 'method' => 'get'])}}
                                            <button rel="tooltip" title="Ativar" class="btn btn-primary btn-simple btn-xs pull-right "><i class="material-icons" style="font-size: 30px; color: green">done</i></button>
                                            {{Form::close()}}
                                            {{Form::open(['route' => ['editHeader', $header->id], 'method' => 'post'])}}
                                            <button rel="tooltip" title="Editar" class="btn btn-primary btn-simple btn-xs pull-right "> <i class="material-icons" style="font-size:30px">create</i></button>
                                            {{Form::close()}}

                                            {{Form::open(['route' => ['deleteHeader', $header->id], 'method' => 'delete'])}}
                                            <button rel="tooltip" title="Deletar" class="btn btn-danger btn-simple btn-xs pull-right" onclick="return confirm('Deseja mesmo Excluir?')"><i class="material-icons" style="font-size:30px">delete</i></button>
                                            {{Form::close()}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @else
                                @if($header_active == null)
                                    <div class="alert alert-warning" style="background: #f44336;" role="alert">
                                        <strong>Ops!</strong> Você não tem um Header Criado
                                    </div>
                                @else
                                <p>Você não tem outros headers</p>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection