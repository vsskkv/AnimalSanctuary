<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetAdopt extends Model
{
    //
    protected $fillable = ['pet', 'user', 'adopted'];
}
