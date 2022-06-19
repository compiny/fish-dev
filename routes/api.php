<?php
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BundleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DevController;
use App\Http\Controllers\MetaDev;
use App\Http\Controllers\MetaDevsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\StoreStateController;
use App\Http\Controllers\TmcController;
use App\Http\Controllers\TroubleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth:api'], function() {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users', [UserController::class, 'update'])->name('users.update');
    Route::post('/create/users', [UserController::class, 'store'])->name('users.create');

    Route::get('/devs/{query?}', [DevController::class, 'index'])->name('dev');
    Route::get('/devs/{id}/edit', [DevController::class, 'edit'])->name('dev.edit');
    Route::get('/create/dev', [DevController::class, 'create'])->name('dev.create');
    Route::post('/create/dev', [DevController::class, 'store'])->name('dev.store');
    Route::post('/devs', [DevController::class, 'update'])->name('dev.update');

    Route::get('/metadev', [MetaDev::class, 'index'])->name('metadev');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
    Route::get('/contacts/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::post('/contacts', [ContactController::class, 'update'])->name('contacts.update');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/customers/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::post('/customers', [CustomerController::class, 'update'])->name('customers.update');
    Route::post('/create/customers', [CustomerController::class, 'store'])->name('customers.create');

    Route::get('/states', [StateController::class, 'index'])->name('states');
    Route::get('/states/{id}', [StateController::class, 'edit'])->name('states.edit');
    Route::post('/states', [StateController::class, 'update'])->name('states.update');
    Route::post('/create/state', [StateController::class, 'store'])->name('states.store');

    Route::get('/vendors', [VendorController::class, 'index'])->name('vendors');
    Route::get('/vendors/{id}', [VendorController::class, 'edit'])->name('vendors.edit');
    Route::post('/vendors', [VendorController::class, 'update'])->name('vendors.update');
    Route::post('/create/vendors', [VendorController::class, 'store'])->name('vendors.create');

    Route::get('/troubles', [TroubleController::class, 'index'])->name('troubles');
    Route::get('/troubles/{id}', [TroubleController::class, 'edit'])->name('troubles.edit');
    Route::post('/troubles', [TroubleController::class, 'update'])->name('troubles.update');
    Route::post('/create/troubles', [TroubleController::class, 'store'])->name('troubles.create');

    Route::get('/services', [ServiceController::class, 'index'])->name('services');
    Route::get('/services/{id}', [ServiceController::class, 'edit'])->name('services.edit');
    Route::post('/services', [ServiceController::class, 'update'])->name('services.update');
    Route::post('/create/services', [ServiceController::class, 'store'])->name('services.create');

    Route::get('/types', [TypeController::class, 'index'])->name('types');
    Route::get('/types/{id}', [TypeController::class, 'edit'])->name('types.edit');
    Route::post('/types', [TypeController::class, 'update'])->name('types.update');
    Route::post('/create/types', [TypeController::class, 'store'])->name('types.create');


    Route::get('/bundles', [BundleController::class, 'index'])->name('bundles.index');
    Route::get('/bundles/{id}', [BundleController::class, 'edit'])->name('bundles.edit');
    Route::post('/bundles', [BundleController::class, 'update'])->name('bundles.update');
    Route::post('/bundle/store', [BundleController::class, 'store'])->name('bundle.store');
    Route::get('/bundle/create', [BundleController::class, 'create'])->name('bundle.create');

    //Route::apiResource('companies', CompanyController::class);

    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show');
    Route::post('/companies', [CompanyController::class, 'update'])->name('companies.update');
    Route::post('/create/companies', [CompanyController::class, 'store'])->name('companies.create');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    //добавления статуса
    Route::post('/create/store_state', [StoreStateController::class, 'store'])->name('store_state.store');

    //tmc
    Route::get('/tmcs/{query?}', [TmcController::class, 'index'])->name('tmcs.index');
    Route::get('/tmcs/{id}/edit', [TmcController::class, 'edit'])->name('tmcs.edit');
    //Route::post('/tmcs', [TmcController::class, 'update'])->name('tmcs.update');

});
