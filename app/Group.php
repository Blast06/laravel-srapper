<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    // every group has only ONE country
    public function countries()
    {
        return $this->hasOne(Country::class);
        
    }

    //every group has many categories
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    // a group belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
