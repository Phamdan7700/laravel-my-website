<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        //
        $categories = Category::where('status', 1)->orderBy('order','asc')->get();
        $postsView = Post::orderByDesc('created_at')->orderByDesc('view')->get();
        View::share(['categories' => $categories, 'postsView' => $postsView]);
        Paginator::useBootstrap();
    }
}
