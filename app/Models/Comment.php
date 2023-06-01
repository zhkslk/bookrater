<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'name',
        'rating',
        'body',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
