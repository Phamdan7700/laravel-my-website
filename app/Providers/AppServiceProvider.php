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
        $this->app->singleton(
            \App\Repositories\Interfaces\PostRepositoryInterface::class,
            \App\Repositories\PostEloquentRepository::class,
            );
        $this->app->singleton(
            \App\Repositories\Interfaces\CategoryRepositoryInterface::class,
            \App\Repositories\CategoryEloquentRepository::class
            );
        $this->app->singleton(
            \App\Repositories\Interfaces\TypeNewsRepositoryInterface::class,
            \App\Repositories\TypeNewsEloquentRepository::class,
            );
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
