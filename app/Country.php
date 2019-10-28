<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //

    // a country has many groups
    public function groups()
    {
        return $this->hasMany(Group::class)->orderBy('created_at','DESC');
    }

}
