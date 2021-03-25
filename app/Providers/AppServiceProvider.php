<?php

namespace App\Providers;

use App\Category;
use App\Lang\Bengali;
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
        $categories = Category::where('sub_topic_id', 0)->get();

        view()->share(['bang'=> new Bengali(), 'categories' => $categories ]);
    }
}




