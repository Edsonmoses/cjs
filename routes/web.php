<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\CreateComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\MenuComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryMenuComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DealComponent;
use App\Http\Livewire\FeaturedproductComponent;
use App\Http\Livewire\ProductDetailsComponent;
use App\Http\Livewire\SubcategoryComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Livewire\CareerComponent;
use App\Http\Livewire\PrivacyComponent;
use App\Http\Livewire\TermsComponent;
use Illuminate\Foundation\Console\PolicyMakeCommand;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/',HomeComponent::class);

Route::get('/menu',MenuComponent::class);

Route::get('/cart',CartComponent::class)->name('product.cart');

Route::get('/checkout',CheckoutComponent::class);

Route::get('/product/{slug}',ProductDetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}',CategoryMenuComponent::class)->name('product.categorymenu');

Route::get('/product-subcategory/{subcategory_slug}',SubcategoryComponent::class)->name('product.subcategory');

Route::get('/featuredProduct',FeaturedproductComponent::class);

Route::get('/privacy',PrivacyComponent::class);

Route::get('/terms',TermsComponent::class);

Route::get('/deal',DealComponent::class);

Route::get('/career', CareerComponent::class);

Route::resource('products', ProductController::class);

Route::resource('category', CategoryController::class);

Route::resource('subcategory', SubcategoryController::class);

Route::get('newsletter',[NewsletterController::class, 'create']);
Route::post('newsletter',[NewsletterController::class, 'store']);


//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //return view('dashboard');
//})->name('dashboard');

//For Users or Customers
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::any('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});

//For Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::any('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
});
