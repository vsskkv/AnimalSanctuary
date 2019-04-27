<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
	protected $table = 'pets';
	 
	public function cafes(){
		return $this->belongsToMany( 'App\Models\User', 'pet_adopt', 'pet_id', 'user_id' );
	}

}
