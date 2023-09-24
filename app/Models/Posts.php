<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Posts extends Model
{
    protected $fillable = [
        'content',
        'post_id',
    ];
    protected $hidden=[
        'created_at',
        'updated_at'
    ];
    use HasFactory;

    

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}