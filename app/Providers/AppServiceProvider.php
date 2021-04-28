<?php

namespace App\Providers;

use App\Category;
use App\Lang\Bengali;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Collection;

use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {

            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(

                $this->forPage($page, $perPage),

                $total ?: $this->count(),

                $perPage,

                $page,

                [

                    'path' => LengthAwarePaginator::resolveCurrentPath(),

                    'pageName' => $pageName,

                ]

            );

        });
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




