<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        // 'pivot'
    ];
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Authors::class);
    }
}