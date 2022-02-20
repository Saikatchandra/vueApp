<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public function categories(){
        return $this->belongsTo('App\Models\Category', 'cat_id', 'id');
    }
    
    public function contents(){
        return $this->hasMany('App\Models\Content', 'subCategory_id', 'id');
    }

}
