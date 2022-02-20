<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function categories(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function sub_categories(){
        return $this->belongsTo('App\Models\SubCategory', 'subCategory_id', 'id');
    }
}
