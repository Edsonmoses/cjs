<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\CareerComponent;
use App\Http\Livewire\PrivacyComponent;
use App\Http\Livewire\TermsComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\WishlistComponent;
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

Route::get('/checkout',CheckoutComponent::class)->name('checkout');

Route::get('/product/{slug}',ProductDetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}',CategoryMenuComponent::class)->name('product.categorymenu');

Route::get('/product-subcategory/{subcategory_slug}',SubcategoryComponent::class)->name('product.subcategory');

Route::get('/favourite',WishlistComponent::class)->name('product.wishlist');

Route::get('/thank-you',ThankyouComponent::class)->name('thankyou');

Route::get('/featuredProduct',FeaturedproductComponent::class);

Route::get('/privacy',PrivacyComponent::class);

Route::get('/terms',TermsComponent::class);

Route::get('/deal',DealComponent::class);

Route::get('/career', CareerComponent::class);
//controllers
Route::resource('products', ProductController::class);

Route::resource('category', CategoryController::class);

Route::resource('subcategory', SubcategoryController::class);

Route::get('/update', [ImageController::class, 'update']);

Route::post('/store', [ImageController::class, 'store']);

Route::get('/subUpdate', [ImageController::class, 'subUpdate']);

Route::post('/storeSub', [ImageController::class, 'storeSub']);

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
    //For Categories
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.editcategory');
    //For Products
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/products/add',AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');
    //For Sliders
    Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');
    //For Home Category
    Route::get('/admin/home-categories',AdminHomeCategoryComponent::class)->name('admin.homecategories');

    //For Coupons
    Route::get('/admin/coupons',AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupon/add',AdminAddCouponComponent::class)->name('admin.addcoupon');
    Route::get('admin/coupon/edit/{coupon_id}',AdminEditCouponComponent::class)->name('admin.editcoupon');
    //For Orders
    Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.orders');


});
