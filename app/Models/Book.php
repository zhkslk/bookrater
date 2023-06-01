<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * App\Models\Book
 *
 * @property int $id
 * @property string $title
 * @property string $cover
 * @property string $description
 * @property float $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\BookFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cover',
        'description',
        'rating',
    ];

    protected function getLimitedDescriptionAttribute(): string
    {
        return Str::limit($this->description, 150);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
