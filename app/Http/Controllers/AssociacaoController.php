<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssociacaoController extends Controller
{

    public function create()
    {

    }

    public function store(Request $request)
    {
        $associacao = new \App\Associacao;
        $associacao->save();

    }



    public function destroy(Request $request, $id)
    {
        $associacao = \App\Usuario::find( $id );
        $associacao->delete();
    }

}
