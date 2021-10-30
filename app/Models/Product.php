<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'category',
        'description',
        'image',
    ];
    public function uploadedFrom(){
        return $this->belongsTo(User::class);
    }


}
