
<header id="page-top" style="background-image:url(
@if(
    isset($header->path) &&
    isset($header->foto_id) &&
    isset($header->format) &&
    !file_exists(asset('/imgs/'.$header->path.'/'.$header->foto_id.".".$header->format))
)

    {{'/imgs/'.$header->path.'/'.$header->foto_id.".".$header->format}}

@else
    {{'/imgs/header/default.jpg'}}
@endif

)">
    <div class="container" >

        <div class="intro-text">
            <div class="intro-lead-in">{{$header->title}}</div>
            <div class="intro-heading">{{$header->subtitle}}</div>
            <a href="#services" class="page-scroll btn btn-xl"
               style="background-color: {{$header->button_color}};
                       border-color: {{$header->button_color}}">{{$header->button_text}}</a>
        </div>

    </div>
</header>

