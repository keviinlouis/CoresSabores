<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Foto extends Model
{
    protected $fillable = [
        'path',
        'caption',
        'title',
        'format'
    ];

    public function storageFoto($img, $path, $caption = null, $title = null){

        $foto = Foto::create([
            'path' => $path,
            'format' => $img->getClientOriginalExtension()
        ]);

        $img->move(base_path() . '/public/imgs/header/', $foto->id.'.'.$foto->format);

        return $foto;
    }

    public function delete(){
        File::delete(base_path().'/public/imgs/'.$this->path.'/'.$this->id.".".$this->format);
        parent::delete();

    }


}

