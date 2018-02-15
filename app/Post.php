<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Mass assignment
     */
    protected $fillable =[
      'title','content','cat_id','featured'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
