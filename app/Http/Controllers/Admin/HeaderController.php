<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Foto;
use App\Models\Admin\Header;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeaderController extends Controller
{
    public function index(){
        $headers = Header::getHeaders()->where('isDefault', '=', 0);

        $header_active = Header::getHeaderActive();
        if(is_array($header_active)){
            $header_active = null;
        }
        return view('admin.header.index', get_defined_vars());
    }

    public function create(){
        return view('admin.header.new');
    }
    public function storage(Request $request){

        $this->validate($request, [
            'file' => 'required',
            'titulo_menor' => 'required',
            'titulo_maior' => 'required',
            'btn_text' => 'required',
            'color' => 'required'
        ]);

        if(!$request->has('default')){
            $request->merge(['default' => 0]);
        }

        $foto = new Foto();
        $foto = $foto->storageFoto($request->file('file'), 'header');

        $header = Header::create([
            'title' => $request['titulo_menor'],
            'subtitle' => $request['titulo_maior'],
            'button_text' => $request['btn_text'],
            'button_color' => $request['color'],
            'foto_id' => $foto->id,
            'is_active' => 0

        ]);

        $request['default']==1?$header->setActive():'';

        return redirect()->route('headerHome');

    }
    public function active(Header $header){
        $header->setActive();
        return redirect()->route('headerHome');
    }

    public function edit(Header $header){
        return view('admin.header.edit', get_defined_vars());
    }

    public function update(Request $request, Header $header){
        $this->validate($request, [

            'titulo_menor' => 'required',
            'titulo_maior' => 'required',
            'btn_text' => 'required',
            'color' => 'required'
        ]);

        if(!$request->has('is_active')){
            $request->merge(['is_active' => 0]);
        }
        if($request->has('file')){
            $foto = new Foto();
            $foto = $foto->storageFoto($request->file('file'), 'header');
        }

        $header->update([
            'title' => $request['titulo_menor'],
            'subtitle' => $request['titulo_maior'],
            'button_text' => $request['btn_text'],
            'button_color' => $request['color'],
            'foto_id' => isset($foto)==true?$foto->id:$header->foto_id,
            'is_active' => 0
        ]);

        $request['is_active']==1?$header->setActive():'';

        return redirect()->route('headerHome');

    }
    public function destroy(Header $header){

        if(strlen($header->foto_id)){
            $foto = Foto::find($header->foto_id);
            $foto->delete();
        }

        $header->delete();

        return redirect()->route('headerHome');
    }
}

