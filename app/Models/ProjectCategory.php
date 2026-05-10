<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
