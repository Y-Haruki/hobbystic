<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function  hobbies()
    {
        return $this->belongsToMany('App\Models\Hobby');
    }

    public function category_chats()
    {
        return $this->hasMany('App\Models\CategoryChat');
    }
}
