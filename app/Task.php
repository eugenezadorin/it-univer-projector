<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function comments()
    {
        $this->hasMany(Comment::class);
    }

    public function assignee()
    {
        $this->belongsTo(User::class);
    }

    public function priority()
    {
        $this->hasOne(Priority::class);
    }

    public function project()
    {
        $this->belongsTo(Project::class);
    }
}

//$task->comments()
