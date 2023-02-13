<?php

use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\Api\ImagesImportsController;
use App\Http\Controllers\Api\IntegrationController;
use App\Http\Controllers\Api\NewsletterIntegrationUserController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProfileApiController;
use App\Http\Controllers\Api\PromocodesGeneratorController;
use App\Http\Controllers\Pages\AddressPage;
use App\Http\Controllers\Pages\CatalogPage;
use App\Http\Controllers\Pages\IndexPage;
use App\Http\Controllers\Pages\User\FavoritesPagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('profile')->group(function(){
    Route::post('address-delete', [ ProfileApiController::class, 'deleteAddress' ]);
});

Route::prefix('product')->group(function (){
    Route::get('get-product-info/{id}', [ ProductApiController::class, 'show' ]);
    Route::post('add-to-favorites', [ ProductApiController::class, 'favorite' ]);
});

Route::post('users', [IntegrationController::class, 'users']);
Route::post('products', [IntegrationController::class, 'products']);
Route::post('currencies', [IntegrationController::class, 'currencies']);
Route::post('categories', [IntegrationController::class, 'categories']);
Route::post('leftovers', [IntegrationController::class, 'leftovers']);



Route::get('index-page/4-products-brand/{brand?}', [IndexPage::class, 'fourProductsBrand']);
Route::get('update-attributes/{product}/{type}/{value}', [CatalogPage::class, 'updateAttributes']);


//Route::get('newsletter-integration-user', NewsletterIntegrationUserController::class);
