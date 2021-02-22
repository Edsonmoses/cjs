<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;

class BreadcrumbsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Breadcrumbs::for('product.categorymenu', fn (Trail $trail) =>
             $trail->push('Product', route('product-category/{category_slug}'))
        );

        Breadcrumbs::for('product.subcategory', fn (Trail $trail) =>
            $trail
                ->parent('menu', route('menu'))
                ->push('Add new photo', route('menu'))
        );
    }
}
