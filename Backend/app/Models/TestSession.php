<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestSession extends Model
{
    protected $fillable = [
        'user_id', 'test_id', 'started_at',
        'submitted_at', 'score', 'percentile', 'answers'
    ];

    protected $casts = [
        'answers'      => 'array',
        'started_at'   => 'datetime',
        'submitted_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}