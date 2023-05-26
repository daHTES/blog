<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){

        Schema::defaultStringLength(191);

        //sidebar posts
        view()->composer('layouts.sidebar', function ($view) {

            if(Cache::has('cats')){

                $cats = Cache::get('cats');

            }
            else {

                $cats = Category::withCount('posts')->orderBy('posts_count', 'desc')->get();
                Cache::put('cats', $cats, 300);

            }

            $view->with('popular_posts', Post::orderBy('views', 'desc')->limit(3)->get());

            $view->with('cats', $cats);

        });

        //footer posts
        view()->composer('layouts.footer', function ($view) {

            if(Cache::has('cats')){

                $cats = Cache::get('cats');

            }
            else {

                $cats = Category::withCount('posts')->orderBy('posts_count', 'desc')->get();
                Cache::put('cats', $cats, 300);

            }

            $view->with('popular_posts', Post::orderBy('views', 'desc')->limit(3)->get());
            $view->with('cats', $cats);
            $view->with('last_posts', Post::orderBy('created_at', 'asc')->limit(3)->get());

        });

        view()->composer('posts.show', function ($view) {

            $view->with('related_category_entries', Post::orderBy('category_id', 'desc')->limit(2)->get());
            $cats = Category::where('slug')->orderBy('id', 'desc')->get();
            $view->with('cats', $cats);
        });

    }
}
