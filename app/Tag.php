<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model{

    use Sluggable;

    protected $fillable = ['title'];

    public function sluggable(): array{
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    //Получение постов
    public function posts(){

        return $this->belongsToMany(Post::class);
    }

}
