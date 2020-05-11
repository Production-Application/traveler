<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'package_id', 'package_date', 'package_time', 'package_member', 'package_expense'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
