<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service_category_id',
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'status',
    ];


    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
