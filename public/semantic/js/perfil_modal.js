jQuery(function(){
	
	//Criar Perfil
	jQuery('.criar_perfil').click( function(){
		jQuery('.ui.perfil_modal').modal('show');
		return false;
	} );

	//Editar
	jQuery('.editar_perfil').click( function(){
		let id = jQuery( this ).data('id'),
			name = jQuery( this ).data('name'),
			modal = jQuery('.ui.editar_perfil_modal'),
			action = modal.data( 'action' );
			action = action + '/' + id;

		modal.attr( 'action', action );
		modal.find('input[name="id"]').val( id );
		modal.find('input[name="nome"]').val( name );
		modal.modal('show');
		return false;
	} );

	//Apagar
	jQuery('.apagar_perfil').click( function(){
		let id = jQuery( this ).data('id'),
			name = jQuery( this ).data('name'),
			modal = jQuery('.ui.apagar_perfil_modal');
			action = modal.data( 'action' );
			action = action + '/' + id;
		modal.attr( 'action', action );
		modal.find('input[name="id"]').val( id );
		modal.find('.profile_name').html( name );
		modal.modal('show');
		return false;
	} );

	jQuery('.ui.selection select').dropdown();
	jQuery('.message .close').on('click', function() {
    	jQuery(this).closest('.message').transition('fade');
  	})


})