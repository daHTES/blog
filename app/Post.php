<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model{

    use Sluggable;

    protected $fillable = ['title', 'description', 'content', 'category_id', 'thumbnail'];

    public function sluggable(): array{
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function uploadImage(Request $request, $image = null){

        if($request->hasFile('thumbnail')){
            if($image){

                Storage::delete($image);
            }

            $folder = date('Y-m-d');

            return $data['thumbnail'] = $request->file('thumbnail')->store("images/{$folder}");
        }

        return null;

    }

    public function getImage(){

        if(!$this->thumbnail){
            return asset("no-image.png");
        }

        return asset("uploads/{$this->thumbnail}");
    }

    // Связь с тегами
    public function tags(){

        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    // Связь с постами
    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function getPostDate(){

        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F, Y');

    }

}
