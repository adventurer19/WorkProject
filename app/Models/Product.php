<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $name
 * @property string $description
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\User|null $uploadedFrom
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product
 *   whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product
 *   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product
 *   whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product
 *   whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product
 *   whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product
 *   whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product
 *   whereUserId($value)
 * @mixin \Eloquent
 */
class Product extends Model
{

    use HasFactory;

    protected $fillable = [
    //        'user_id',
    'category_id',
    'name',
    'description',
    'image',
    ];

    public function uploadedFrom()
    {
        return $this->hasOne(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
