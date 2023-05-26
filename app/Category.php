<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{

    use Sluggable;

    protected $fillable = ['title'];

    public function sluggable(): array{
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

        // Получение постов через многие-ко-многим
        public function posts(){

            return $this->hasMany(Post::class);
        }


}
