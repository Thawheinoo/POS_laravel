<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\user\UserProductController;


Route::group(['prefix' => 'user', 'middleware' => 'user'], function () {

    Route::get('home', [UserController::class, 'userHome'])->name('userHome');


    Route::group(['prefix' => 'profile'], function () {
        Route::get('page', [UserController::class, 'profilepage'])->name('user#profilepage');
        Route::get('editpage', [UserController::class, 'editpage'])->name('user#editpage');

        Route::post('edit/{id}', [UserController::class, 'edit'])->name('user#edit');
    });

    Route::group(['prefix' => 'changePassword'], function () {
        Route::get('page', [UserController::class, 'changepasswordPage'])->name('changePassword#page');
        Route::post('change', [UserController::class, 'change'])->name('changePassword#change');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('detailsPage/{id}', [UserProductController::class, 'detailsPage'])->name('product#detailsPage');

        Route::post('addToCart', [UserProductController::class, 'addToCart'])->name('product#addToCart');

        //cart route
        Route::get('cart', [UserProductController::class, 'cart'])->name('product#cart');
        //cart product delete
        Route::post('cart/delete{id}', [UserProductController::class, 'delete'])->name('product#cartdelete');

        //api route for temporary session cart data
        Route::get('cart/temp', [UserProductController::class, 'temp'])->name('product#cartTemp');

        //payment route
        Route::get('payment/page', [UserProductController::class, 'paymentpage'])->name('product#paymentpage');

        //payment slip info
        Route::post('payment/slip', [UserProductController::class, 'slip'])->name('product#paymentSlip');

        //order page
        Route::get('order/page', [UserProductController::class, 'orderPage'])->name('product#orderPage');

        //view order list
        Route::get('order/page/viewOrderList{order_code}', [UserProductController::class, 'viewOrderList'])->name('product#viewOrderLists');

        //customer product comment
        Route::post('comment', [UserProductController::class, 'comment'])->name('product#comment');
        //comment delete
        Route::get('delete/{id}', [UserProductController::class, 'commentdelete'])->name('comment#delete');

        //rating product route
        Route::post('rating', [UserProductController::class, 'rating'])->name('product#rating');
    });

    //contact page route
    Route::get('contactPage',[ UserController::class , 'contactPage'])->name('contact#page');
    //contact
    Route::post('contact',[UserController::class , 'contact'])->name('contact');
});
