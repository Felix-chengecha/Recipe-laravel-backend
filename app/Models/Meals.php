<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meals extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'category',
        'image',
        'level'
    ];

    public function ingridients(){
        return $this->hasMany(Ingridients::class);
    }

    public function Bookmarks(){
        return $this->hasMany(Bookmarks::class);
    }
}
