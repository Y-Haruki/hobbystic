<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HobbyChat extends Model
{
    use HasFactory;

    protected $fillable = ['chat', 'user_id', 'hobby_id'];

    // public function scopeGetData($query)
    // {
    //     $user = User::find($this->user_id);
    //     $user_name = $user->name;
    //     return $this->created_at . ' @' . $user_name . ' ' . $this->chat;
    // }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function hobby()
    {
        return $this->belongsTo('App\Models\Hobby');
    }
}
