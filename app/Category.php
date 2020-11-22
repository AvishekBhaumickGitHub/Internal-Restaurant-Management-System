<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // The belong function is specifing what is the RELATIONSHIP of table Category with table Menu
    // For one given catergory there will be MANY menu instances

    public function menu(){
        return $this->hasMany(Menu::class);
    }
}
