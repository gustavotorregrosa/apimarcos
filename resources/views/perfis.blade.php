@extends('template')

@section('titulo', 'Perfis')

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
	<div class="main ui usuarios">
		<a class="criar_perfil ui positive button" href="">Criar Perfil</a>
		<table class="ui celled striped table">
	      <thead>
		      	<tr>
		      		<th></th>
		      		<th>Perfil</th>
		      		<th>Opções</th>
		      	</tr>
		  </thead>
	      <tbody>
			@foreach($perfis as $perfil)
		        <tr>
		          <td class="collapsing">
		            <i class="user icon"></i>
		          </td>
		          <td>{{ $perfil->nome }}</td>
		          <td>
		          	<a class="editar_perfil ui positive button" data-id="{{$perfil->id}}" data-name="{{$perfil->nome}}" href="">Editar</a>
		          	<a class="apagar_perfil ui negative button" data-id="{{$perfil->id}}" data-name="{{$perfil->nome}}" href="">Apagar</a>
	      		  </td>
		        </tr>
			@endforeach
	      </tbody>
	    </table>
	</div>
	<div class="main ui container usuarios">
		<div class="ui dimmer modals page transition hidden">
			<form class="ui form standard perfil_modal modal scrolling transition hidden" name="create_profile" method="post" data-action="{{ url('/perfil') }}" action="{{ url('/perfil') }}">
				 {{ csrf_field() }}
			    <div class="header">
			      Criar Perfil
			    </div>
			    <div class="image content">
			      <div class="description">
		        	<div class="field">
				        <label>Perfil</label>
						<div class="field">
							<input type="text" name="profile" placeholder="Digite o Perfil">
						</div>
				    </div>	        
			      </div>
			    </div>
			    <div class="actions">
			      <div class="ui black deny button">
			        Cancelar
			      </div>
			      <button type="submit" class="ui positive right labeled icon button" name="create_profile">
			        Criar
			        <i class="checkmark icon"></i>
			      </button>
			    </div>
	  		</form>
	  		<form class="ui form standard editar_perfil_modal modal scrolling transition hidden" name="edit_profile" method="post" data-action="{{ url('/perfil') }}" action="{{ url('/perfil') }}">
				 {{ csrf_field() }}
				 {{ method_field('PUT') }}
			    <div class="header">
			      Editar Perfil
			    </div>
			    <div class="image content">
			      <div class="description">
		        	<div class="field">
				        <label>Perfil</label>
						<div class="field">
							<input type="hidden" name="id" value="">
							<input type="text" name="nome" placeholder="Digite o Perfil">
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
	  		<form class="ui tiny apagar_perfil_modal modal transition" name="delete_profile" method="post" data-action="{{ url('/perfil') }}" action="{{ url('/perfil') }}">
				 {{ csrf_field() }}
				 {{ method_field('DELETE') }}
				 <input type="hidden" name="id">
			    <div class="header">
			      Apagar Perfil
			    </div>
			    <div class="content">
			      <p>Tem certeza que deseja apagar o perfil <strong class="profile_name"></strong> ?</p>
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
	<script type="text/javascript" src="{{ asset('semantic/js/perfil_modal.js') }}"></script>
@endsection