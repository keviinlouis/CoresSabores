<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Header extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'button_text', 'button_color', 'foto_id', 'is_active'
    ];

    public function fotos(){
        return $this->hasOne(Foto::class);
    }

    public static function getHeaders(){
        return Header::leftJoin('fotos', 'headers.foto_id', '=', 'fotos.id')
            ->select('headers.*', 'fotos.path', 'fotos.format')
            ->where('headers.id', '!=', 1)
            ->orderByDesc('headers.created_at')
            ->get();

    }

    public static function getHeaderActive(){
        if(count(Header::where('is_active', '=', 1)->first()) <= 0){

             return ['obj' => Header::getHeaders()->first(), 'status' => false];
        }else {

             return Header::getHeaders()->where('is_active', '=', 1)->first();
        }

    }
    public static function getDefault(){
         return Header::leftJoin('fotos', 'headers.foto_id', '=', 'fotos.id')->select('headers.*', 'fotos.path', 'fotos.format')->where('headers.id', '=', 1)->first();

    }

    public function setActive(){
        $have_active = Header::where('is_active', '=', 1);
        if(count($have_active) > 0){
            $have_active->update(['is_active' => 0]);
        }
        $this->update(['is_active' => 1]);
    }

}