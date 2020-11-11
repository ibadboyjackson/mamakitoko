<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Membre extends Model
{
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
