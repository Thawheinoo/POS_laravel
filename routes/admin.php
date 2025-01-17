<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController as ControllersProfileController;
use App\Http\Controllers\SaleInformation;
use App\Http\Controllers\SaleInformationController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {


    //home dashboard
    Route::get('home', [AdminController::class, 'adminHome'])->name('adminHome');



    //category routes//
    Route::group(['prefix' => 'category'], function () {

        Route::get('list', [CategoryController::class, 'list'])->name('category#list');
        Route::post('list/create', [CategoryController::class, 'create'])->name('category#create');
        Route::post('lsit/delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
        Route::get('list/show/{id}', [CategoryController::class, 'show'])->name('category#show');
        Route::post('list/update', [CategoryController::class, 'update'])->name('category#update');
    });


    //profile routes //
    Route::group(['prefix' => 'profile'], function () {

        //direct route for passwordChange page
        Route::get('changePassword', [ProfileController::class, 'change'])->name('profile#changePassword');
        //update password route
        Route::post('changePassword/update', [ProfileController::class, 'update'])->name(('profile#updatePassword'));

        //direct route for profile page
        Route::get('profile', [ProfileController::class, 'profilePage'])->name('profile#page');

        //direct route for editprofile
        Route::get('edit', [ProfileController::class, 'profileEdit'])->name('profile#editpage');
        //edit profile
        Route::post('edit', [ProfileController::class, 'edit'])->name('profile#edit');

        //add admin routes
        Route::group(['middleware' => 'superadmin'], function () {
            //direct route for add adminAccount
            Route::get('add/adminAccount', [ProfileController::class, 'adminAccount'])->name('add#adminAccount');
            //create admin
            Route::post('create/adminAccount', [ProfileController::class, 'createAdmin'])->name('create#adminAccount');
            //view admin list page
            Route::get('view/adminList', [ProfileController::class, 'adminListPage'])->name('view#adminListPage');
            //delete admin
            Route::get('delete/adminAccoun/{id}', [ProfileController::class, 'deleteAdmin'])->name('delete#adminAccount');
            //view user list page
            Route::get('view/userList', [ProfileController::class, 'userListPage'])->name('view#userListPage');
        });
    });


    //payment routes //
    Route::group(['prefix' => 'payment'], function () {

        //direct route for payment pages
        Route::get('method/page', [PaymentController::class, 'page'])->name('payment#page');
        //create route for add bankaccount
        Route::post('method/create', [PaymentController::class, 'add'])->name('paymetn#add');
        //edit/show route for bankaccount
        Route::get('method/edit/{id}', [PaymentController::class, 'editshow'])->name('payment#editshow');
        //edit route for bankaccount
        Route::post('method/edit/{id}', [PaymentController::class, 'edit'])->name('payment#edit');
        //delete route for bankaccount
        Route::get('method/delete/{id}', [PaymentController::class, 'delete'])->name('payment#delete');
        //direct route for view all bank account
        Route::get('all/account', [PaymentController::class, 'all'])->name('payment#allAccount');
    });


    //product routes //
    Route::group(['prefix' => 'product'], function () {
        //direct route for product Page
        Route::get('createPage', [ProductController::class, 'createPage'])->name('product#page');
        //create product
        Route::post('create', [ProductController::class, 'create'])->name('product#create');
        //product list page
        Route::get('list/{lowamt?}', [ProductController::class, 'listpage'])->name('product#listpage');
        //product details page
        Route::get('detail/{id}', [ProductController::class, 'detail'])->name('product#detail');
        //product edit page
        Route::get('edit/{id}', [ProductController::class, 'editpage'])->name('product#editpage');
        //product edit(update)
        Route::post('edit', [ProductController::class, 'edit'])->name('product#edit');
        //product delete
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product#delete');
    });

    //order routes
    Route::group(['prefix' => 'order'], function () {

        //order list page
        Route::get('list/page', [OrderController::class, 'listPage'])->name('order#listPage');

        //ordercode details page
        Route::get('detail/page/{order_code}', [OrderController::class, 'detailPage'])->name('order#detailPage');

        //api for change status in list page
        Route::get('change/status', [OrderController::class, 'changeStatus'])->name('order#changeStatus');

        //api for product comfirmation in detail page
        Route::get('confirm', [OrderController::class, 'confirm'])->name('order#confirm');

        //api for product reject in detail page
        Route::get('reject', [OrderController::class, 'reject'])->name('order#reject');
    });

    //contact page route
    Route::get('contactPage', [ContactController::class, 'page'])->name('admin#contact');
    //replay comment route
    Route::post('contact/message', [ContactController::class, 'message'])->name('contact#message');


    //sale information page route
    Route::get('saleinformation', [SaleInformationController::class, 'sale'])->name('sale#information');
});
