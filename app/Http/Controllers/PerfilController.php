<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index(){
        $perfis = \App\Perfil::all();
        return view('perfis', ['perfis' => $perfis, 'msg' => false]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $perfil = new \App\Perfil;
        $perfil->nome = $request->input('profile');
        $perfil->save();
        $request->session()->flash( 'msg', "$perfil->nome, foi adicionado a lista de perfis." );
        return redirect('/perfil');
    }

    public function show($id)
    {

    }


    public function edit($id)
    {

    }

    public function update( Request $request, $id )
    {
        $perfil = \App\Perfil::find( $id );
        $data = $this->validate($request, [
            'id' => 'required',
            'nome' => 'required',
        ]);
        $perfil->update( $data );
        $request->session()->flash( 'msg', "$perfil->nome, foi atualizado." );
        return redirect('/perfil');
    }

    public function destroy(Request $request, $id)
    {
        $perfil = \App\Perfil::find( $id );
        $nome = $perfil->nome;
        $perfil->delete();
        $request->session()->flash( 'msg', "$nome, foi apagado." );
        return redirect('/perfil');
    }
}
