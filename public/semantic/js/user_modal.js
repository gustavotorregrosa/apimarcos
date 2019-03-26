jQuery(function(){
	
	//Criar Perfil
	jQuery('.criar_usuario').click( function(){
		jQuery('.ui.usuario_modal').modal('show');
		return false;
	} );

	//Editar
	jQuery('.editar_usuario').click( function(){
		let id = jQuery( this ).data('id'),
			name = jQuery( this ).data('name'),
			email = jQuery( this ).data('email'),
			perfil_id = jQuery( this ).data('perfil'),
			listagem = jQuery( this ).data('listagem'),
			modal = jQuery('.ui.editar_usuario_modal'),
			action = modal.data( 'action' );
			action = action + '/' + id;
			console.log(listagem);
		modal.attr( 'action', action );
		modal.find('input[name="id"]').val( id );
		modal.find('input[name="nome"]').val( name );
		modal.find('input[name="email"]').val( email );
		modal.find('select[name="perfil_id"]').val( perfil_id );
		modal.modal('show');
		return false;
	} );

	//Apagar
	jQuery('.apagar_usuario').click( function(){
		let id = jQuery( this ).data('id'),
			name = jQuery( this ).data('name'),
			modal = jQuery('.ui.apagar_usuario_modal');
			action = modal.data( 'action' );
			action = action + '/' + id;
		modal.attr( 'action', action );
		modal.find('input[name="id"]').val( id );
		modal.find('.usuario_name').html( name );
		modal.modal('show');
		return false;
	} );

	jQuery('.ui.selection select').dropdown();
	jQuery('.message .close').on('click', function() {
    	jQuery(this).closest('.message').transition('fade');
  	})

  	//Perfis 
  	jQuery( '.single_profile' ).change( function(){
		let input_values = [];
		let input_values_unchecked = [];
		let data = '{"inputs":{"ipt_checked":"","ipt_unchecked":""}}';
		let newjson = JSON.parse( data );
		// vendo quem está checkado pra guardar
		jQuery( '.single_profile' ).each(function(){
			if( jQuery( this ).prop("checked") ){
				input_values.push(jQuery( this ).val());
				newjson.inputs.ipt_checked = input_values;
			}else{
				input_values_unchecked.push(jQuery( this ).val());
				newjson.inputs.ipt_unchecked = input_values_unchecked;
			}
		})
		// setando no input hidden
		jQuery( 'input[name="profiles"]' ).val( JSON.stringify(newjson)  );
  	} )


})