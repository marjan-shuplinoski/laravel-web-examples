<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'author', 'email', 'body', 'is_active','photo'];

    public function replies()
    {
        return $this->hasMany(CommentReply::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
