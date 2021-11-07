<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\This;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[]
 *   $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[]
 *   $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[]
 *   $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[]
 *   $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[]
 *   $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User
 *   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User
 *   whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User
 *   wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User
 *   whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User
 *   whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User
 *   whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User
 *   whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
    protected $fillable = [
    'name',
    'email',
    'password',
    ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array
   */
    protected $hidden = [
    'password',
    'remember_token',
    ];

  /**
   * The attributes that should be cast.
   *<<
   *
   * @var array
   */
    protected $casts = [
    'email_verified_at' => 'datetime',
    ];

    public function products()
    {

        return $this->hasMany(Product::class);
    }

    public function roles()
    {

        return $this->belongsToMany(Role::class);
    }

    public function categories()
    {

        return $this->hasMany(Category::class);
    }

  /** check if the user has a role
   *
   * @param  string  $role
   *
   * @return bool
   */
    public function hasAnyRole($role)
    {

        return null !== $this->roles()->where('name', $role)->first();
    }
}
