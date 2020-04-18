<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function path()
    {
        return sprintf('/projects/%s/tasks/%s', $this->project->slug, $this->id);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
