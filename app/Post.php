<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use softDeletes;
    protected $dates = [
        'published_at'
    ];
    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at', 'category_id', 'user_id'
    ];
    public function getimageAttribute($image){
        return asset($image);
    }
    public function category()
    {

        return $this->belongsTo('App\Category');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    /**
     *check if post has tag
     *
     */
    public function hastag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toarray());
    }

    public function user()
    {

        return $this->belongsTo('App\User');
    }
    public function scopeSearched($query)
    {
        $search = request()->query('search');
        if (!$search) {

            return $query->published();
        }
        return $query->published()->where('title', "%{$search}%");
    }


    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }
}
