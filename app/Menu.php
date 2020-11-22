<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // Each Menu will belong to atleast one Category
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
