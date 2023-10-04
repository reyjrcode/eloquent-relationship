<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comments extends Model
{

    protected $fillable = [
        'content',
        'user_id',
        'postings_id',

    ];
    use HasFactory;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function postings(): BelongsTo
    {
        return $this->belongsTo(Postings::class);
    }
}