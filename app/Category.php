<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Membre;

class Category extends Model
{
    protected $fillable = ['name'];

    public function membre(){
        return $this->hasMany('App\Membre');
    }
}
