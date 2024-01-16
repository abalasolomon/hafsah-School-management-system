<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\SchoolFeePaymentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[IndexController::class,'index'])->name('index');
    Route::resource('/roles', RolesController::class);
    Route::post('/roles/{role}/permissions', [RolesController::class,'givePermission'])->name('roles.permission');
    Route::delete('/roles/{role}/permissions/{permission}', [RolesController::class,'revokePermission'])->name('roles.permission.revoke');

    Route::resource('/permission', PermissionController::class);
    Route::post('/permission/{permission}/roles', [PermissionController::class,'assignRole'])->name('permission.roles');
    Route::delete('/permission/{permission}/roles/{role}', [PermissionController::class,'removeRole'])->name('permission.roles.remove');
    

    Route::get('/users/{user}',[UserController::class,'show'])->name('users.show');

    Route::get('/users',[UserController::class,'index'])->name('users.index');
    

    Route::delete('/users/{user}/',[UserController::class,'index'])->name('users.destroy');
    Route::post('/user/{user}/roles',[UserController::class,'assignRole'])->name('users.roles');
    Route::delete('/user/{user}/roles/{role}',[UserController::class,'removeRole'])->name('user.roles.remove');
    Route::post('/user/{user}/permission/',[UserController::class,'givePermission'])->name('users.permission');
    Route::delete('/user/{user}/permission/{permission}',[UserController::class,'revokepermission'])->name('users.permission.revoke');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/staff', StaffController::class);
    //Route::get('/staff/{user}', [StaffController::class, 'details'])->name('staff.details');
    Route::get('/sales/report', [SaleController::class, 'salesReport'])->name('sales.report');
    Route::post('/sales/report', [SaleController::class, 'salesReport'])->name('sales.report.date');

    Route::resource('/class', ClassesController::class);
    Route::resource('/section', SectionController::class);
    Route::resource('/inventory', InventoryController::class);
    Route::resource('/sales', SaleController::class);

    Route::get('/expenses/salary', [ExpenseController::class,'getSalaries'])->name('expenses.salary');

    Route::resource('/expenses', ExpenseController::class);
    Route::resource('/cart', CartController::class);
    Route::resource('/school-fee', SchoolFeePaymentController::class);
    
    
    
    Route::get('/cart/getStudentCart/{studentId}', [CartController::class,'getStudentCart']);
    Route::get('/sales/{studentId}/destroy', [SaleController::class,'destroy'])->name('sales.destroy');
    Route::post('/cart/items/search', [CartController::class,'searchItems'])->name('cart.search.items');
    Route::post('/cart/items/add', [CartController::class,'addItemToCart'])->name('cart.addItem');
    Route::get('/cart/checkout/{studentId}', [CheckoutController::class,'checkout'])->name('cart.checkout');
    Route::post('/cart/update', [CartController::class,'updateCart'])->name('cart.updateCart');
    Route::post('/cart/remove', [CartController::class,'removeItem'])->name('cart.remove-item');
    Route::post('/cart/getTotal/{studentId}', [CartController::class,'getCartTotal'])->name('cart.CartTotal');
    
    Route::post('/class/{class}/assign/',[ ClassesController::class,'assignClass'])->name('class.assign');
    Route::post('/class/{class}/remove/',[ ClassesController::class,'removeTeacher'])->name('class.removeTeacher');

    
    Route::resource('/subject', SubjectController::class);

    Route::resource('/student', StudentController::class);
   // Route::resource('/class/{class}', [ClassesController::class,'details'])->name('class.details');
});


require __DIR__.'/auth.php';
