<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'filename', 'color', 'project_id' ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function filters()
    {
        return $this->belongsToMany(Filter::class);
    }
}
