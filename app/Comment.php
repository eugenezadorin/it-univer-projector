<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
