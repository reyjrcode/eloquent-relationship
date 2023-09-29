<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

// use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{

    protected $fillable = [
        'bio',

    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        // 'pivot'
    ];
    use HasFactory;
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}