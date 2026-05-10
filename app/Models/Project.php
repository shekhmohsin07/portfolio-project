<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_category_id',
        'title',
        'slug',
        'image',
        'short_description',
        'description',
        'client_name',
        'project_url',
        'project_date',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
