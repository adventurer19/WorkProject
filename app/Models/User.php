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
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    /** check if the user has a role
     *@param string $role
     * @return bool
     */
    public function hasAnyRole($role){

        return null !==$this->roles()->where('name',$role)->first();

    }
//    public function setAdmin(){
//        // problem it can be added multiple times
//       $id =   $this->attributes['id'];
//        DB::table('role_user')->insert([
//            'role_id'=>1,
//            'user_id'=>$id
//        ]);
//
//    }





}
