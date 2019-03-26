<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = \App\Usuario::all();

        // with('perfil')->get();
        $perfis = \App\Perfil::all();
        return view('usuarios', ['usuarios' => $usuarios, 'perfis' => $perfis]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
       
        $usuario = new \App\Usuario;
        
        $usuario->nome = $request->input( 'nome' );
        $usuario->email = $request->input( 'email' );
        $usuario->password = md5( $request->input( 'password' ) );
        $usuario->logado = 0;
        $usuario->meio = 'facebook';

        $usuario->save();
        
        $perfis = json_decode($request->input('profiles'))->inputs->ipt_checked;
        // dd($perfis);

        foreach($perfis as $perfil) {
            
            $usuario->perfil()->attach($perfil);
            // $usuario->associacao()->attach($perfil);
        }
        

        $request->session()->flash( 'msg', "Usuário $usuario->nome, foi adicionado a lista de usuários." );
        return redirect('/usuario');
    }

    public function show($id)
    {

    }


    public function edit($id)
    {

    }

    public function update( Request $request, $id )
    {
    	var_dump("chegou aqui");
        $usuario = \App\Usuario::find( $id );

        $data = $this->validate($request, [

            'nome' => 'required',
            'email' => 'required',
            'password' => 'required',
            'perfil_id' => 'required',
        ]);
        $data['id'] = $id;
        $data['password'] = md5($request->password);
        $usuario->update( $data );
        $request->session()->flash( 'msg', "$usuario->nome, foi atualizado." );
        return redirect('/usuario');
    }

    public function destroy(Request $request, $id)
    {
        $usuario = \App\Usuario::find( $id );
        $nome = $usuario->nome;
        $usuario->delete();
        $request->session()->flash( 'msg', "$nome, foi apagado." );
        return redirect('/usuario');
    }

    public function auth( Request $request )
    {
    	dd($request);
	 //    $data = json_decode('[{"auth":{"email":"marcos@visie.com.br","password":"123mudar"}}]');   
	 //    if ( is_array( $data ) ){
		//     $request = array_shift($data);	
	 //    }

		// $dados = ['email'=> $request->auth->email, 'password'=> md5( $request->auth->password )];
		
		// // Query
		// $find = \App\Usuario::where(function($q ) use ($dados){
		// 	$q->where('email','=', $dados['email']);
		// 	$q->where('password','=', $dados['password']);
		// })->get();

		// if( $find ){
		// 	$response = json_encode($find);
		// }else{
		// 	$response = json_encode(['error' => 'Não autorizado !'], 401);
		// }

    	return $response;
    }
}
