<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModelTumblerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TumblerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController; // <-- add this line
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//route for auth controller (login and sign up admin and user)
Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::controller(AuthController::class)->group(function () {
        // for register
        Route::get('register', 'register')->name('register');
        Route::post('register', 'registerSave')->name('register.save');
        // for login
        Route::get('login', 'login')->name('login');
        Route::post('login', 'loginAction')->name('login.action');

        //for admin
        Route::get('Admin/login', 'LoginAdmin')->name('LoginAdmin');
        // for logout
        Route::get('logout', 'logout')->middleware('auth')->name('logout');
    });
});

// route for home page
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
//about us
Route::get('/#about-us', function () {
    return view('/Pages/home/#about-us');
});
//model
Route::get('/Model_home', [App\Http\Controllers\HomeController::class, 'model'])->name('model.home');
//new trending


Route::get('/categories', [App\Http\Controllers\HomeController::class, 'Categories'])->name('search.categories');
Route::get('/category/{id}/tumblers', [\App\Http\Controllers\HomeController::class, 'filterByCategory'])->name('category.tumblers');
//route for filter model
Route::get('/model/{id}/tumblers', [\App\Http\Controllers\HomeController::class, 'filterByModel'])->name('model.tumblers');
//route for filter tumbler by category
Route::get('/category/{id}/tumblers', [\App\Http\Controllers\HomeController::class, 'filterInCategory'])->name('category.tumblers');
//search model
Route::get('/search/model', [\App\Http\Controllers\HomeController::class, 'searchModel'])->name('search.model');
//route for normal user
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/User/Dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard'])->name('User/Dashboard');
    Route::get('/User/Profile/Edit', [\App\Http\Controllers\HomeController::class, 'userEdit'])->name('User/Profile/Edit');
    Route::get('User/profile', [UserController::class, 'edit'])->name('user.profile');
    Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
    Route::get('User/Model', [HomeController::class, 'model'])->name('user.model');
    Route::get('User/Tumbler', [HomeController::class, 'tumbler'])->name('user.tumbler');
    Route::get('User/Tumbler/details/{id}', [TumblerController::class, 'details'])->name('user.tumbler.details');

    Route::get('user/viewCart', [CartController::class, 'cart'])->name('user.viewCart');
    Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::post('/remove-from-cart/{key}', [CartController::class, 'removeFromCart'])->name('remove.from.cart');
    Route::post('/cart/update-quantity/{key}', [\App\Http\Controllers\CartController::class, 'updateCartQuantity'])->name('update.cart.quantity');
    // Order history
    Route::get('/hostory/order', [OrderController::class, 'history'])->name('view.history');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    //rating star and review
    Route::post('/tumbler/{id}/rate', [App\Http\Controllers\TumblerController::class, 'rate'])->name('tumbler.rate');
    Route::post('/tumbler/{id}/review', [TumblerController::class, 'addReview'])->name('tumbler.addReview');
    Route::get('/user/reviews', [TumblerController::class, 'userReviews'])->name('user.reviews');
    Route::get('/user/reviews/{id}/edit', [TumblerController::class, 'editReview'])->name('user.reviews.edit');
    Route::put('/user/reviews/{id}/update', [TumblerController::class, 'updateReview'])->name('user.reviews.update');
    Route::delete('/user/reviews/{id}/delete', [TumblerController::class, 'deleteReview'])->name('user.reviews.delete');

    Route::post('/cart/submit-order', [OrderController::class, 'submitOrder'])->name('cart.submitOrder');
    //customize tumbler
    Route::get('/customize_tumbler/{id}', [HomeController::class, 'customizeTumbler'])->name('customize.tumbler');
    Route::post('/customize_tumbler/{id}/save', [HomeController::class, 'saveCustomizedTumbler'])->name('customize.tumbler.save');
    Route::get('/customized-tumblers', [HomeController::class, 'customizedTumblers'])->name('customized.tumblers');
    Route::get('/customized_tumbler/{id}/details', [HomeController::class, 'customizedTumblerDetails'])->name('customized.tumbler.details');
    Route::post('/customized_tumbler/{id}/delete', [HomeController::class, 'deleteCustomizedTumbler'])->name('customized.tumbler.delete');

    // Route for filtering tranding sales 
    Route::get('/Tranding-Tumblers',[HomeController::class, 'filterTrandingTumblers'])->name('trending.tumblers');
});

Route::post('/orders/clear', [OrderController::class, 'clearAllHistory'])
    ->name('orders.clear')
    ->middleware('auth');

Route::post('/orders/delete/{id}', [OrderController::class, 'clearHistoryById'])
    ->name('orders.delete')
    ->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::get('User/Categories', [HomeController::class, 'Categories'])->name('user.categories');
});

//route for admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/Admin/Dashboard', [\App\Http\Controllers\HomeController::class, 'adminHome'])->name('Admin/Dashboard');
    //User Route
    Route::get('/Admin/customer', [AdminController::class, 'customer']);
    Route::get('/Admin/customer/edit/{id}', [AdminController::class, 'editRole'])->name('Admin.customer.edit');
    // For updating user role
    Route::put('/admin/users/{user}/update', [AdminController::class, 'updateRole'])->name('admin.updateRole');
    // For viewing all users
    Route::get('/admin/users', [AdminController::class, 'ListRole'])->name('admin.users.role');
    // For deleting user
    Route::delete('/admin/users/{user}/delete', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
    //Route for Categories
    Route::get('/Admin/Categories', [\App\Http\Controllers\CategoriesController::class, 'categories'])->name('Admin/Categories');
    Route::post('/Admin/Categories/Create', [\App\Http\Controllers\CategoriesController::class, 'store'])->name('Categories.store');
    Route::put('/Admin/Categories/Edit/{id}', [\App\Http\Controllers\CategoriesController::class, 'update'])->name('Categories.edit');
    Route::post('/Admin/Categories/Delete/{id}', [\App\Http\Controllers\CategoriesController::class, 'destroy'])->name('Categories.delete');

    //Route for Model
    Route::get('/Admin/Model', [\App\Http\Controllers\ModelTumblerController::class, 'Model'])->name('Admin/Model');
    Route::post('/Admin/model/create', [\App\Http\Controllers\ModelTumblerController::class, 'store'])->name('Model.store');
    Route::put('/Admin/model/edit/{id}', [\App\Http\Controllers\ModelTumblerController::class, 'update'])->name('model.update');
    Route::post('/Admin/model/delete/{id}', [\App\Http\Controllers\ModelTumblerController::class, 'destroy'])->name('Model.delete');

    //Route for Product
    Route::get('/Admin/view/tumbler', [TumblerController::class, 'tumbler'])->name('Admin.view.tumbler');
    Route::post('/Admin/store/tumbler', [TumblerController::class, 'store'])->name('tumbler.store');
    Route::put('/Admin/update/tumbler/{id}', [TumblerController::class, 'update'])->name('update.tumbler');
    Route::delete('/Admin/delete/tumbler/{id}', [TumblerController::class, 'destroy'])->name('Admin.delete.tumbler');

    //Route for Order
    Route::get('/orders', [OrderController::class, 'adminOrders'])->name('admin.orders');
    Route::post('/orders/{order}/confirm', [AdminController::class, 'confirmOrder'])->name('admin.orders.confirm');
    Route::delete('/orders/{order}/reject', [OrderController::class, 'rejectOrder'])->name('admin.orders.reject');

    //Route for Report
    Route::get('/admin/reports', [\App\Http\Controllers\ReportController::class, 'index'])->name('admin.reports');
    Route::get('/admin/reports/monthly', [ReportController::class, 'monthly'])->name('admin.report.monthly');
    Route::get('/admin/reports/export', [ReportController::class, 'export'])->name('admin.report.export');
    Route::get('/admin/orders/{order}', [AdminController::class, 'show'])->name('admin.orders.show');
});
//test route

Route::get("/Tumblers", function () {
    return view("/Admin/Product");
});
Route::get('/customize', function () {
    return view('/Pages/customize');
});
Route::get('/customizedetails', function () {
    return view('/Pages/customizedetails');
});

// Add this new route outside the middleware group
Route::get('/Categories_home', [App\Http\Controllers\HomeController::class, 'Categories'])->name('categories.home');

// Update the existing routes
Route::get('/Tumbler_home', [App\Http\Controllers\HomeController::class, 'tumbler'])->name('tumbler.home');
Route::get('/details_tumbler/{id}', [App\Http\Controllers\TumblerController::class, 'details'])->name('tumbler.details');

// Add this temporary route for debugging
Route::get('/debug-tumblers', function () {
    $tumblers = \App\Models\Tumbler::with(['category', 'model'])->get();
    dd([
        'tumbler_count' => $tumblers->count(),
        'first_tumbler' => $tumblers->first(),
        'has_category' => optional($tumblers->first())->category,
        'has_model' => optional($tumblers->first())->model,
    ]);
});
Route::patch('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
Route::patch('/orders/{order}/mark-shipped', [OrderController::class, 'markShipped'])->middleware('admin')->name('orders.markShipped');
Route::patch('/orders/{order}/mark-delivered', [OrderController::class, 'markDelivered'])->middleware('admin')->name('orders.markDelivered');
Route::get('/search', [HomeController::class, 'search'])->name('search.categories');
