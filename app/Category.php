<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    // a category has many posts
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
