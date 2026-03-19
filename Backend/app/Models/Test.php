<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'title', 'company', 'duration_minutes',
        'type', 'total_marks', 'description', 'is_active'
    ];

    public function questions()
    {
        return $this->hasMany(TestQuestion::class);
    }

    public function sessions()
    {
        return $this->hasMany(TestSession::class);
    }
}