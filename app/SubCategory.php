<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['category_id', 'sub_category_name', 'sub_category_status', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
