<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $casts = [
        'due_date' => 'datetime',
    ];
    protected $fillable = ['title', 'description', 'status', 'due_date', 'project_id', 'priority' ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
