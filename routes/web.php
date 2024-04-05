<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\frontend\IndexController;
use App\Models\User;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\ProductController;
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

//user routes:
    Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard', compact('user')); // ca sa ne fie vizibila poza pe care o selectam in edit profile user sa fie vizibila in dashboard
    })->name('dashboard');
    Route::get('/', [IndexController::class, 'index']);
    Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
    Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');



//Admin routes:
    Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
        Route::get('/login', [AdminController::class, 'loginForm']);
        Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
    });
    Route::middleware(['auth:admin'])->group(function(){
            Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dash', function () {
                return view('admin.index');
                })->name('dashb')->middleware('auth:admin');
                
            Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
            Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
            Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
            Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
        
        
        
        //admin category routes
            Route::prefix('category')->group(function(){
                Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
                Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
                Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
                Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
                Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
        
            //admin subcategory routes
                Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
                Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
                Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
                Route::post('/sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
                Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
        
            //admin SUBsubcategory routes
                Route::get('/sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
                Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
                Route::post('/sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
                Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
                Route::post('/sub/sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
                Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
        });
        
        
        
        //admin product routes
        Route::prefix('product')->group(function(){
            Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');
            Route::post('/store', [ProductController::class, 'ProductStore'])->name('product-store');
            Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
            Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
            Route::post('/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
            Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
            Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
            Route::post('/thumbnail/update', [ProductController::class, 'ThumbnailUpdate'])->name('update-product-thumbnail');
            Route::get('/product/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
            Route::get('/product/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
            Route::get('/product/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
            
        
        });
});
