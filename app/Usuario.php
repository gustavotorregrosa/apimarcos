<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
	use SoftDeletes;
	protected $table = 'usuario';
	protected $guarded = ['password'];

	public function perfil(){
		// return $this->belongsTo('App\Perfil', 'perfil_id');
		return $this->belongsToMany('App\Perfil', 'App\Associacao');
	}

	public function associacao(){
		return $this->belongsTo('App\Associacao');
	}

}