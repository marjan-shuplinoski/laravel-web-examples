<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;

    protected $fillable = ['comment_id', 'post_id', 'author', 'email', 'body', 'is_active', 'photo'];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
