<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'placement_jobs';

    protected $fillable = [
        'title', 'company', 'location',
        'type', 'deadline', 'description', 'posted_by'
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function postedBy()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }
}