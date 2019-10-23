<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //

    // a country belongs to a group
    public function groups()
    {
        return $this->belongsTo(Group::class)->orderBy('created_at','DESC');
    }

}
