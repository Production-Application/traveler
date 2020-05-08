<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'category_id', 'sub_category_id', 'package_title',
        'package_sub_title', 'package_attractions',
        'package_best_time', 'package_des', 'package_img', 'slug'
    ];

    protected $casts = [
        'package_img' => 'json'
    ];

    public function schedules()
    {
        return $this->belongsTo(Schedule::class);
    }
}
