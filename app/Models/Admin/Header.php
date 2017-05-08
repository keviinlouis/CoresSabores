<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Header extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'button_text', 'button_color', 'foto_id', 'isDefault'
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
        if(count(Header::where('isDefault', '=', 1)->first()) <= 0){

             return ['obj' => Header::getHeaders()->first(), 'status' => false];
        }else {

             return Header::getHeaders()->where('isDefault', '=', 1)->first();
        }

    }
    public static function getDefault(){
         return Header::leftJoin('fotos', 'headers.foto_id', '=', 'fotos.id')->select('headers.*', 'fotos.path', 'fotos.format')->where('headers.id', '=', 1)->first();

    }

    public function setActive(){
        $have_active = Header::where('isDefault', '=', 1);
        if(count($have_active) > 0){
            $have_active->update(['isDefault' => 0]);
        }
        $this->update(['isDefault' => 1]);
    }

}