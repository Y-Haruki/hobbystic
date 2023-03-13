<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Hobby extends Model
{
    use HasFactory;

    public function hobbies()
    {
        return $this->belongsTo('App\Models\Hobby');
    }

    public function categories()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
