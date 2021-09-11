<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'post_id', 'user_id'];

    public static function getPostComments($postId)
    {
        return Comment::join('users', 'comments.user_id', 'users.id')
            ->where('comments.post_id', $postId)
            ->select('comments.*', 'users.first_name', 'users.last_name')
            ->orderBy('comments.id', 'desc')
            ->get();
    }
}
