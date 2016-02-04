<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'body'];

    // Hide data when it cast to an array or JSON.
    // Laravel makes this easier, but you shouldn't rely on it.
//    protected $hidden = ['title'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
