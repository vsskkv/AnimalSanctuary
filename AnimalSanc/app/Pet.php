<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
	protected $table = 'pets';
	 
	public function users(){
		return $this->belongsToMany( User::class );
	}

}
 