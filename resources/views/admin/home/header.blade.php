<div class="card">
    <div class="card-header" data-background-color="orange">
        <h4 class="title">Header</h4>
        <a href="{{route('headerHome')}}" class="btn btn-info pull-right"><i class="material-icons">forward</i>Ver Headers</a>
    </div>
    <div class="card-content">
        @if($header != null)
            <p><b>Titulo Menor:</b> {{$header->title}}</p>
            <p><b>Titulo Maior:</b> {{$header->subtitle}}</p><br>
            <p><b>Botao:</b> <a href="" onclick="event.preventDefault()" class=" btn btn-xl" style="background-color: {{$header->button_color}}; border-color: {{$header->button_color}}">{{$header->button_text}}</a> </p><br>
            <p><b>Background:</b></p>
            @if(!file_exists(asset('/imgs/'.$header->path.'/'.$header->foto_id.".".$header->format)))
                <img src="{{asset('/imgs/'.$header->path.'/'.$header->foto_id.".".$header->format)}}"><br><br>
            @else
                <img src="{{asset('/imgs/'.$header->path.'/default.jpg')}}"><br><br>
            @endif
        @else
            <p>Você não tem Headers criados</p>
            <a href="{{route('newHeader')}}" class="btn btn-success "><i class="material-icons">add_circle_outline</i> Novo Header</a>
        @endif
    </div>
</div>