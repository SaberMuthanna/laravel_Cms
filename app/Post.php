<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use softDeletes;

    protected $fillable = [
        'title', 'description', 'content', 'image','published_at', 'category_id'
    ];
    public function category()
    {

        return $this->belongsTo('App\Category');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
