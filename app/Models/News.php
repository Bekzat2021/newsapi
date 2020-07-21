<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = [
        'heading', 'announcement', 'author', 'text', 'rubric', 'publication_date'
    ];

    public $timestamps = false;

    public function news()
    {
        return $this->hasMany('App\Models\Rubric');
    }
}
