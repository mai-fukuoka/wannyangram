<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['caption'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function likes_users()
    {
        return $this->belongsTo(User::class, 'likes', 'post_id', 'user_id')->withTimestamps();
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
