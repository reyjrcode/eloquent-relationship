<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Postings extends Model
{

    protected $fillable = [
        'title',
        'content',
        'user_id',

    ];
    use HasFactory;
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function comments():HasMany
    {
        return $this->hasMany(Comments::class);
    }
}