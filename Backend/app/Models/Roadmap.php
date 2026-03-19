<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    protected $fillable = [
        'user_id', 'target_company',
        'content', 'generated_at'
    ];

    protected $casts = [
        'content'      => 'array',
        'generated_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}