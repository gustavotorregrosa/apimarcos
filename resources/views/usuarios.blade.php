@extends('template')

@section('titulo', 'Usuários')
@section('mensagem-generica')
	@if( Session::has('msg') )
		<div class="ui info message">
	      <i class="close icon"></i>
	      <div class="header">
	        Operação bem sucedida !
	      </div>
	      <ul class="list">
	        <li>O perfil {{ Session::get('msg') }}</li>
	      </ul>
	    </div>
    @endif
@endsection
@section('conteudo-principal')
	
	<div class="main ui container usuarios">
		<a class="criar_usuario ui positive button" href="">Criar Usuario</a>
		<table class="ui celled striped table">
	      <thead>
		      	<tr>
		      		<th></th>
		      		<th>Nome</th>
		      		<th>Email</th>
		      		<th>Perfil</th>
		      		<th>Opções</th>
		      	</tr>
		  </thead>
	      <tbody>
			@foreach($usuarios as $usuario)
		        <tr>
		          <td class="collapsing">
		            <i class="user icon"></i>
		          </td>
		          <td>{{ $usuario->nome }}</td>
		          <td>{{ $usuario->email }}</td>
		          <td>
									@foreach($usuario->perfil as $perfilIndividual)
											{{ $perfilIndividual->nome }}<br>
									@endforeach
							</td>
		          <td>
		          	<a data-listagem="{{ $usuario->listagem }}" class="editar_usuario ui positive button" data-id="{{$usuario->id}}" data-name="{{$usuario->nome}}" data-email="{{$usuario->email}}" data-perfil="{$usuario->perfil_id}" href="">Editar</a>
		          	<a class="apagar_usuario ui negative button" data-id="{{$usuario->id}}" data-name="{{$usuario->nome}}" href="">Apagar</a>
	      		  </td>
		        </tr>
			@endforeach
	      </tbody>
	    </table>
		<div class="ui dimmer modals page transition hidden">
			<form class="ui form standard usuario_modal modal scrolling transition hidden" name="create_user" method="post" data-action="{{ url('/usuario') }}" action="{{ url('/usuario') }}">
				 {{ csrf_field() }}
			    <div class="header">
			      Cadastrar usuário
			    </div>
			    <div class="image content">
			      <div class="description">
		        	<div class="field">
				        <label>Usuario</label>
						<div class="field">
							<div class="two fields">
								<div class="field">
									<input type="text" name="nome" required placeholder="Digite o nome">
								</div>
								<div class="field">
									<input type="email" name="email" required placeholder="Digite o email">
								</div>
							</div>
							<div class="two fields">
								<div class="field">
									<input type="password" name="password" required placeholder="Digite a senha">
								</div>
								<div class="field">
									<label>Selecione um Perfil</label>
									<input type="hidden" name="profiles">
									@if( $perfis )
										@foreach($perfis as $perfil)
										<label>
											<input class="single_profile" type="checkbox" name="single_profile" value="{{$perfil->id}}"></option>
											<span>{{$perfil->nome}}</span>
										</label>
										@endforeach
									@endif
								</div>
							</div>
						</div>
				    </div>	        
			      </div>
			    </div>
			    <div class="actions">
			      <div class="ui black deny button">
			        Cancelar
			      </div>
			      <button type="submit" class="ui positive right labeled icon button">
			        Criar
			        <i class="checkmark icon"></i>
			      </button>
			    </div>
	  		</form>
	  		<form class="ui form standard editar_usuario_modal modal scrolling transition hidden" method="post" name="edit_user" data-action="{{ url('/usuario') }}" action="{{ url('/usuario') }}">
				 {{ csrf_field() }}
				 {{ method_field('PUT') }}
			    <div class="header">
			      Editar Usuário
			    </div>
			    <div class="image content">
			      <div class="description">
		        	<div class="field">
				        <label>Usuario</label>
						<div class="field">
							<div class="two fields">
								<div class="field">
									<input type="text" name="nome" required placeholder="Digite o nome">
								</div>
								<div class="field">
									<input type="email" name="email" required placeholder="Digite o email">
								</div>
							</div>
							<div class="two fields">
								<div class="field">
									<input type="password" name="password" placeholder="Digite a senha">
								</div>
								<div class="field">
									<label>Selecione um Perfil</label>
									<input type="hidden" name="profiles">
									@if( $perfis )
										@foreach($perfis as $perfil)
										<label>
											<input class="single_profile" name="single_profile" type="checkbox" value="{{$perfil->id}}"></option>
											<span>{{$perfil->nome}}</span>
										</label>
										@endforeach
									@endif
								</div>
							</div>
						</div>
				    </div>	        
			      </div>
			    </div>
			    <div class="actions">
			      <div class="ui black deny button">
			        Cancelar
			      </div>
			      <button type="submit" class="ui positive right labeled icon button">
			        Salvar
			        <i class="checkmark icon"></i>
			      </button>
			    </div>
	  		</form>
	  		<form class="ui tiny apagar_usuario_modal modal transition" name="delete_usuario" method="post" name="delete_user" data-action="{{ url('/usuario') }}" action="{{ url('/usuario') }}">
				 {{ csrf_field() }}
				 {{ method_field('DELETE') }}
				 <input type="hidden" name="id">
			    <div class="header">
			      Apagar Perfil
			    </div>
			    <div class="content">
			      <p>Tem certeza que deseja apagar o usuario <strong class="usuario_name"></strong> ?</p>
			    </div>
			    <div class="actions">
			      <div class="ui negative button">
			        Não
			      </div>
			      <button type="submit" name="delete_profile" class="ui positive right labeled icon button">
			        Sim
			        <i class="checkmark icon"></i>
			      </button>
			    </div>
			</form>
		</div>
	</div>
 
@endsection


@section('script-adicional')
	<script type="text/javascript" src="{{ asset('semantic/js/user_modal.js') }}"></script>
@endsection