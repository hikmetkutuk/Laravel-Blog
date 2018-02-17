<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /**
     * Mass assignment
     */
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
      'title','content','cat_id','featured','slug'
    ];

    /**
     * [getFeaturedAttribute description]
     * Acessors
     */
    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
