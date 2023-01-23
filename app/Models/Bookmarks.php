<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmarks extends Model
{
    use HasFactory;

    protected $fillable=[
        'meals_id',
        'user_id',
    ];

    public function meals(){
        return $this->belongsTo(Meals::class);
    }
}
