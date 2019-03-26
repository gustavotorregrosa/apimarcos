<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Associacao extends Model
{
	use SoftDeletes;
    protected $table = 'associacao';
	protected $fillable = ['usuario_id'];
}