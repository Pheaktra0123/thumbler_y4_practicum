<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModelTumblerController;
use App\Http\Controllers\TumblerController;
use App\Http\Controllers\UserController;
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

Route::get('/Trending_home', function () {
    return view('/Pages/Home_Trending_Tumbler');
});
Route::get('/categories', [App\Http\Controllers\HomeController::class, 'Categories'])->name('search.categories');
//route for normal user
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/User/Dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard'])->name('User/Dashboard');
    Route::get('/User/Profile/Edit', [\App\Http\Controllers\HomeController::class, 'userEdit'])->name('User/Profile/Edit');
    Route::get('User/profile', [UserController::class, 'edit'])->name('user.profile');
    Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
    Route::get('User/Model', [HomeController::class, 'model'])->name('user.model');
    Route::get('User/Tumbler', [HomeController::class, 'tumbler'])->name('user.tumbler');
    Route::get('User/Tumbler/details/{id}', [TumblerController::class, 'details'])->name('user.tumbler.details');
});

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
    Route::get('/Admin/Categories/Delete/{id}', [\App\Http\Controllers\CategoriesController::class, 'destroy'])->name('Categories.delete');

    //Route for Model
    Route::get('/Admin/Model', [\App\Http\Controllers\ModelTumblerController::class, 'Model'])->name('Admin/Model');
    Route::post('/Admin/model/create', [\App\Http\Controllers\ModelTumblerController::class, 'store'])->name('Model.store');
    Route::put('/Admin/model/edit/{id}', [\App\Http\Controllers\ModelTumblerController::class, 'update'])->name('model.update');
    Route::get('/Admin/model/delete/{id}', [\App\Http\Controllers\ModelTumblerController::class, 'destroy'])->name('Model.delete');

    //Route for Product
    Route::get('/Admin/view/tumbler', [TumblerController::class, 'tumbler'])->name('Admin.view.tumbler');
    Route::post('/Admin/store/tumbler', [TumblerController::class, 'store'])->name('tumbler.store');
    Route::put('/Admin/update/tumbler/{id}', [TumblerController::class, 'update'])->name('update.tumbler');
    Route::get('/Admin/delete/tumbler/{id}', [TumblerController::class, 'destroy'])->name('Admin.delete.tumbler');
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

Route::get('/customize_tumbler', function () {
    return view('/Pages.customize_tumbler');
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

Route::get('/search', [HomeController::class, 'search'])->name('search.categories');
