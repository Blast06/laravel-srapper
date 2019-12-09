<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //

    public function groups()
    {
        return $this->hasMany(Group::class)->orderBy('created_at', 'DESC');
    }
}
