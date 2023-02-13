<?php

use App\Http\Controllers\Actions\ActionsController;
use App\Http\Controllers\Actions\AuthController;
use App\Http\Controllers\Actions\CurrencyController;
use App\Http\Controllers\Actions\LanguageController;
use App\Http\Controllers\Actions\OrdersStatusesController;
use App\Http\Controllers\Actions\SearchController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\AuthController as AAuthController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\BrandsDescriptionsController;
use App\Http\Controllers\Admin\CareerCategoryController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\SeoBrandsController;
use App\Http\Controllers\Admin\SeoCategoriesController;
use App\Http\Controllers\Admin\ColorsController;
use App\Http\Controllers\Admin\ContactAddressesController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\CustomerRequestsController;
use App\Http\Controllers\Admin\FavoriteController;
use App\Http\Controllers\Admin\ImagesImportsController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewImageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PackPromocodeController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ResumesController;
use App\Http\Controllers\Admin\ReturningController;
use App\Http\Controllers\Admin\SectionsCollectionsController;
use App\Http\Controllers\Admin\SeoMenuController;
use App\Http\Controllers\Admin\SeoProductImageController;
use App\Http\Controllers\Admin\SeoProductsController;
use App\Http\Controllers\Admin\SlidesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\YouthProductsController;
use App\Http\Controllers\Admin\ZhannasController;
use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\Api\CDEKController;
use App\Http\Controllers\GeomaController;
use App\Http\Controllers\ImportProductsController;
use App\Http\Controllers\Pages\AddressPage;
use App\Http\Controllers\Pages\CareerPage;
use App\Http\Controllers\Pages\Cart\CartPageController;
use App\Http\Controllers\Pages\Cart\OrderPageController;
use App\Http\Controllers\Pages\CatalogPage;
use App\Http\Controllers\Pages\IndexPage;
use App\Http\Controllers\Pages\NewsPage;
use App\Http\Controllers\Pages\OrderReturn;
use App\Http\Controllers\Pages\Partnership;
use App\Http\Controllers\Pages\ProfileAddressesPage;
use App\Http\Controllers\Pages\ProfilePage;
use App\Http\Controllers\Pages\ProfilePasswordPage;
use App\Http\Controllers\Pages\ResumeController;
use App\Http\Controllers\Pages\User\FavoritesPagesController;
use App\Http\Controllers\Pages\User\ProfileOrdersPage;
use App\Http\Controllers\Pages\YouthProducts;
use App\Http\Controllers\Pages\ZhannasChoice;
use App\Http\Controllers\Pages\ZhannasLetter;
use App\Imports\ImagesImport;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

Route::get('geoma-prices-excel', function () {
    Excel::import(new \App\Imports\GeomaPricesImport(), public_path('imports/geoma-prices-excel/price 3.xlsx'));
});

Route::get('delete-laperla-products-characterstics', function () {
    $v = \App\Models\ProductCharacteristic::where('brand', 'La Perla')->get();

    dd($v);
});

// LANGUAGE
Route::get('/lg/{lg}', [LanguageController::class, 'index'])->name('language.change');

// CURRENCY
Route::get('/currency/{currency}', [CurrencyController::class, 'index'])->name('currency.change');

// ADMIN
Route::get('/login', [AAuthController::class, 'login']);
Route::post('/login', [AAuthController::class, 'login_action']);
Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::view('/', 'admin.index')->middleware('can:all');

    Route::resource('geoma', \App\Http\Controllers\Admin\GeomaController::class)->middleware('can:manager');
    Route::resource('orders', OrdersController::class)->middleware('can:manager');
    Route::resource('returnings', ReturningController::class)->middleware('can:manager');
    Route::get('products/export-thousand', [ProductsController::class, 'exportThousand'])->name('products.export-thousand')->middleware('can:manager');
    Route::get('products/export', [ProductsController::class, 'export'])->name('products.export')->middleware('can:manager');
    Route::resource('products', ProductsController::class)->except('store', 'destroy')->middleware('can:manager');
    Route::resource('products-images', ProductImageController::class)->middleware('can:manager');
    Route::resource('users', UsersController::class)->middleware('can:manager');
    Route::get('promocodes/generate/{id}', [PackPromocodeController::class, 'generate'])->name('promocodes.generate')->middleware('can:manager');
    Route::get('promocodes/export/{id}', [PackPromocodeController::class, 'export'])->name('promocodes.export')->middleware('can:manager');
    Route::resource('promocodes', PackPromocodeController::class)->middleware('can:manager');

    Route::resource('seo_menu', SeoMenuController::class)->middleware('can:seo');
    Route::resource('seo_brands', SeoBrandsController::class)->middleware('can:seo');
    Route::resource('seo_products', SeoProductsController::class)->middleware('can:seo');
    Route::resource('seo_categories', SeoCategoriesController::class)->middleware('can:seo');
    Route::resource('seo_product_images', SeoProductImageController::class)->middleware('can:seo');

    Route::resource('zhannas', ZhannasController::class)->middleware('can:admin');
    Route::post('zhannas/name', [ZhannasController::class, 'rename'])->name('zhannas.rename')->middleware('can:admin');
    Route::resource('youth-products', YouthProductsController::class)->middleware('can:admin');
    Route::resource('menu', MenuController::class)->middleware('can:admin');
    Route::resource('colors', ColorsController::class)->middleware('can:admin');
    Route::resource('sliders', SlidesController::class)->middleware('can:admin');
    Route::resource('banners', BannersController::class)->middleware('can:admin');
    Route::resource('brands-descriptions', BrandsDescriptionsController::class)->middleware('can:admin');
    Route::resource('customer-requests', CustomerRequestsController::class)->only('index', 'destroy')->middleware('can:admin');
    Route::group(['prefix' => 'images-imports', 'as' => 'images-imports.', 'middleware' => 'can:admin'], function () {
        Route::get('/', [ImagesImportsController::class, 'index'])->name('index');
        Route::get('create/excel', [ImagesImportsController::class, 'createExcel'])->name('create_excel');
        Route::post('store/excel', [ImagesImportsController::class, 'storeExcel'])->name('store_excel');
        Route::get('create/zip', [ImagesImportsController::class, 'createZip'])->name('create_zip');
        Route::post('store/zip', [ImagesImportsController::class, 'storeZip'])->name('store_zip');
        Route::get('excel_vendor_slug', [ImagesImportsController::class, 'excelVendorSlug'])->name('excel_vendor_slug');
    });
    Route::resource('news', NewsController::class)->middleware('can:admin');
    Route::resource('news-images', NewImageController::class)->middleware('can:admin');
    Route::resource('sections-collections', SectionsCollectionsController::class)->middleware('can:admin');
    Route::resource('career', CareerController::class)->middleware('can:admin');
    Route::resource('career_category', CareerCategoryController::class)->middleware('can:admin');
    Route::resource('resume', ResumesController::class)->middleware('can:admin');
    Route::resource('addresses', AddressController::class)->middleware('can:admin');
    Route::resource('addresses', AddressController::class)->only('index', 'show')->middleware('can:admin');
    Route::resource('favorites', FavoriteController::class)->only('index')->middleware('can:admin');
    Route::resource('contacts', ContactsController::class)->middleware('can:admin');
    Route::resource('contact-addresses', ContactAddressesController::class)->middleware('can:admin');
});


Route::any('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('cart')->group(function() {
    Route::get('/', [CartPageController::class, 'index'])->name('cart');
    Route::post('wishlist', [CartPageController::class, 'store'])->name('cart.wishlist');
    Route::post('promocode', [CartPageController::class, 'promocode'])->name('cart.promocode');
    Route::get('promocode/forget', [CartPageController::class, 'promocodeForget'])->name('cart.promocode_forget');
});

Route::get('import-test-products', [ImportProductsController::class, 'store']);

Route::get('order/{order?}', [OrderPageController::class, 'index'])->name('order.main');
Route::post('order-create', [OrderPageController::class, 'store'])->name('order.create');

Route::get('returns/{id?}', [OrderReturn::class, 'index'])->name('page.return');
Route::post('returns', [OrderReturn::class, 'store'])->name('page.return.action');

Route::get('zhannas-letter', [ZhannasLetter::class, 'index'])->name('zhannas.letter');
Route::get('search/{q?}', [SearchController::class, 'search']);

// CAREER
Route::group(['prefix' => 'career', 'as' => 'career.'], function () {
    Route::get('list/{category_slug?}', [CareerPage::class, 'list'])->name('list');
    Route::get('{id}', [CareerPage::class, 'index'])->name('index');
});

// ACTIONS
Route::post('subscription', [ActionsController::class, 'subscription'])->name('subscription.store');
Route::post('contact-us', [ActionsController::class, 'contacts'])->name('page.contact.action');
Route::post('customer-request', [ActionsController::class, 'customerRequest'])->name('index.customer_request');
Route::post('send-resume', [ResumeController::class, 'index'])->name('send-resume.index');

// ORDER STATUSES
Route::prefix('order-status')->group(function() {
    Route::post('success/{id}', [OrdersStatusesController::class, 'success'])->name('order.status.success');
    Route::post('error/{id}', [OrdersStatusesController::class, 'error'])->name('order.status.error');
    Route::post('cancel/{id}', [OrdersStatusesController::class, 'cancel'])->name('order.status.cancel');
});

// AUTH USER ROUTES
Route::middleware('auth')->group(function(){
    Route::post('repair', [OrderReturn::class, 'repair'])->name('return.action');

    // ORDER
    Route::prefix('orders')->group(function () {
        Route::get('order/delivery/{id}', [OrderPageController::class, 'dinfo'])->name('order.dinfo');
        Route::post('order/delivery/{id}', [OrderPageController::class, 'delivery'])->name('order.delivery');
        Route::get('order/payment/{id}', [OrderPageController::class, 'paymentCheck'])->name('order.payment.1');
        Route::post('order/payment/{id}', [OrderPageController::class, 'paymentProcess'])->name('order.payment.process');
    });

    // PROFILE
    Route::prefix('profile')->group(function() {
        Route::get('/', [ProfilePage::class, 'index'])->name('user.profile');
        Route::get('details', [ProfilePage::class, 'show'])->name('user.profile.details');

        Route::get('edit', [ProfilePage::class, 'edit'])->name('user.profile.edit');
        Route::post('edit', [ProfilePage::class, 'update'])->name('user.profile.update');

        Route::get('password', [ProfilePasswordPage::class, 'edit'])->name('user.profile.password');
        Route::post('password', [ProfilePasswordPage::class, 'update'])->name('user.profile.password.update');

        Route::get('address', [ProfileAddressesPage::class, 'create'])->name('user.profile.address');
        Route::post('address', [ProfileAddressesPage::class, 'store'])->name('user.profile.address.create');
        Route::get('address/{id}', [ProfileAddressesPage::class, 'edit'])->name('user.profile.address.edit');
        Route::put('address/{id}', [ProfileAddressesPage::class, 'update'])->name('user.profile.address.update');

        Route::get('orders', [ProfileOrdersPage::class, 'index'])->name('user.profile.orders');
        Route::get('orders/{id}', [ProfileOrdersPage::class, 'show'])->name('user.profile.orders.show');

        Route::get('favorites', [FavoritesPagesController::class, 'index'])->name('user.profile.favorites');
        Route::get('refund_request', [FavoritesPagesController::class, 'refund_request_page'])->name('user.profile.refund_request_page');
        Route::post('remove-item/{id}', [FavoritesPagesController::class, 'remove']);
    });
});

// INFO PAGES
Route::prefix('info')->group(function () {
    Route::view('delivery', 'pages.info.delivery')->name('page.info.delivery');
    Route::view('return', 'pages.info.return')->name('page.info.return');
    Route::view('payment', 'pages.info.payment')->name('page.info.payment');
    Route::view('size-guide', 'pages.info.size_guide')->name('page.info.size_guide');
    Route::view('loyalty', 'pages.info.loyalty')->name('page.info.loyalty');
    Route::view('faq', 'pages.info.faq')->name('page.info.faq');
    Route::view('law', 'pages.info.law')->name('page.info.law');
    Route::view('repair', 'pages.info.repair')->name('page.info.repair');
});

// PARTNERSHIP PAGES
Route::prefix('partnership')->group(function() {
    Route::post('/', [ActionsController::class, 'partnership'])->name('partnership.action');
    Route::get('press', [Partnership::class, 'press'])->name('partnership.press');
    Route::get('sponsors', [Partnership::class, 'sponsors'])->name('partnership.sponsors');
    Route::get('partners', [Partnership::class, 'partners'])->name('partnership.partners');
    Route::get('agents', [Partnership::class, 'agents'])->name('partnership.agents');
});

// GEOMA
Route::get('/geoma/consturctor', [GeomaController::class, 'index'])->name('geoma');
Route::post('/geoma/consturctor', [GeomaController::class, 'store'])->name('geoma.store');

// ABOUT PAGES
Route::prefix('about')->group(function (){
    Route::view('about', 'pages.about.about')->name('about.about');
    Route::get('contacts', [AddressPage::class, 'index'])->name('about.contacts');
    Route::get('news', [NewsPage::class, 'index'])->name('about.news');
    Route::get('news/{id}', [NewsPage::class, 'show'])->name('about.new_page');
});

// API CART
Route::prefix('api/cart')->group(function() {
    Route::post('add-to-cart', [CartApiController::class , 'add']);
    Route::post('update-qty', [CartApiController::class, 'update']);
    Route::post('remove-item', [CartApiController::class, 'remove']);
    Route::get('notification', [CartApiController::class, 'notification']);
});

Route::prefix('api/order')->group(function() {
    Route::post('update-qty', [CartApiController::class, 'update_order']);
    Route::post('remove-item', [CartApiController::class, 'remove_order']);

    Route::get('cdek-order-info/{id}', [CDEKController::class, 'info']);
    Route::get('calculate-delivery/{orderId}/{deliveryId}', [CDEKController::class, 'calculate'])->name('cdek.calculate');
});

// BASIC AUTH ROUTES
Route::prefix('auth')->group(function() {
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('login-guest', [AuthController::class, 'login_guest'])->name('auth.login.guest');
});

// CATALOG PAGES
Route::get('youth-products', [YouthProducts::class, 'index'])->name('page.youth_products');
Route::get('zhannas-choice', [ZhannasChoice::class, 'index'])->name('page.zhannas_choice');
Route::get('product/{slug}', [CatalogPage::class, 'show'])->name('page.product');
Route::get('catalog/{sex?}/{category?}', [CatalogPage::class, 'index'])->name('page.catalog');
Route::get('{category?}', [IndexPage::class, 'index'])->name('page.index');
