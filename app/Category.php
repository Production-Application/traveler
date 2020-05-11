<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'category_des', 'category_img', 'category_status', 'slug'];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
