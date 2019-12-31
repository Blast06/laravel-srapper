<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'user_id',
        'country_id',
        'category_id',
        'type_id',
        'tag_id'
    ];
    //

    // every group has only ONE country
    public function countries()
    {
        return $this->belongsTo(Country::class);
        
    }



    //a group belongs to a category
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    // a group belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function types()
    {
        return $this->belongsTo(Type::class);
    }
}
