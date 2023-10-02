<?php

declare(strict_types=1);

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CalcsController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PayPalPaymentController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\TaagerController;
use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Api\FavouriteController;
use App\Http\Controllers\Api\GovernrateController;
use App\Http\Controllers\Api\Pay;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\SizeController;
use Illuminate\Routing\RouteCollection;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/


Route::middleware([
    'api',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class, 'cors',
])->prefix('v1')->group(function(){



    if (isset(getallheaders()['Authorization'])) {


        Route::apiResource(
            'cart',
            CartController::class,
        )->middleware("auth:users");
    }
    else{
        Route::apiResource(
            'cart',
            CartController::class,
        );
    }


    Route::apiResource(
        'user',
        UserController::class,
    );

    Route::post('login',[AuthController::class , 'logIn']);

    Route::apiResource(
        'category',
        CategoryController::class,
    );

    Route::apiResource(
        'subcategory',
        SubCategoryController::class,
    );

 if (isset(getallheaders()['Authorization'])) {
    # code...
    Route::apiResource(
        'product',
        ProductController::class,
    )->middleware('auth:users');

    Route::get('search', [ProductController::class, 'searchProducts']);
 }
else {
    # code...
    Route::apiResource(
        'product',
        ProductController::class,
    );

    Route::get('search', [ProductController::class, 'searchProducts']);
}


    Route::get('cancel-payment', 'PayPalPaymentController@paymentCancel')->name('cancel.payment');

    Route::get('payment-success', 'PayPalPaymentController@paymentSuccess')->name('success.payment');


});


// api
Route::middleware([
    'api',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class, 'cors',
    'auth:users'
])->prefix('v1')->group(function () {
    Route::get('/', function () {


        // App\Models\Tenant::all()->runForEach(function () {
        //     App\Models\User::factory()->create();
        // });
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });



    // Route::get('/users', function () {
    //     dd('fake');
    //     return User::all();
    // });



    Route::post('handle-payment', [pay::class, 'pay'])->name('make.payment');




    Route::get('/insert-user', function () {
        return User::create([
            'name' => 'mohamed',
            'email' => 'adl774855@gmail.com',
            'password' => bcrypt('123')
        ]);
    });






    Route::apiResource(
        'offer',
        OfferController::class,
    );


    Route::apiResource(
        'size',
        SizeController::class,
    );




    Route::apiResource(
        'favourite',
        FavouriteController::class,
    );



    Route::apiResource(
        'review',
        ReviewController::class,
    );


    Route::apiResource(
        'order',
        OrderController::class,
    );





    Route::apiResource(
        'taager',
        TaagerController::class,
    );


    Route::apiResource(
        'address',
        AddressController::class,
    );

    Route::apiResource(
        'payment-method',
        PaymentController::class,
    );
    Route::apiResource(
        'governrate',
        GovernrateController::class,
    );


    Route::controller(CalcsController::class)->group(function(){
        Route::post('total-price' , 'calculateTotalPrice');
        Route::post('sub-total' , 'calculateSubPrice');
        Route::post('shipping-price' , 'calculateShippingPrice');
    });


});




// dashboard
