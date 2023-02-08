<?php

use App\Http\Controllers\Blog\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestTestController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth:sanctum')->group( function () {
    $groupData = [
        'namespace' => '\App\Http\Controllers\Blog\Admin',
        'prefix' => 'admin/employee'
    ];
    Route::group($groupData, function () {
        $methods = ['index', 'edit', 'store', 'update', 'create', 'destroy'];
        //EmployeeController show employers
        Route::resource('management', 'EmployeeController')
            ->only($methods)
            ->names('panel.admin.employers');
    });
});

Auth::routes();



