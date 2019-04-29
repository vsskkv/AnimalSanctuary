<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hootlex\Moderation\Moderatable;


class PetAdopt extends Model
{
    //
    use Moderatable;
    protected $table = 'pet_adopts';

    protected $fillable = ['pet', 'user'];
}
