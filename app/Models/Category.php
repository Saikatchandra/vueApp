<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function subCategories(){
        return $this->hasMany('App\Models\SubCategory', 'cat_id', 'id');
    }
    
    public function contents(){
        return $this->hasMany('App\Models\Content', 'category_id', 'id');
    }
}
