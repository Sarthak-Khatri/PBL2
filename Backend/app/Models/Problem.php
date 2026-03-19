<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = [
        'title', 'slug', 'description',
        'difficulty', 'topic', 'test_cases',
        'editorial', 'acceptance_rate'
    ];

    protected $casts = [
        'test_cases' => 'array'
    ];

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}