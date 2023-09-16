<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backened\ProperttyTypeController;
use App\Http\Controllers\Backened\PropertyController;
use App\Http\Controllers\Backened\RoleController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
//user fontend all Route
Route::get('/', [UserController::class, 'Index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class,'UserProfile'])->name('user.profile');
    Route::post('/user/profile/store', [UserController::class,'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/logout', [UserController::class,'UserLogout'])->name('user.logout');
    Route::get('/user/change/password',[UserController::class,'UserChangePassword'])->name('user.change.password');
    Route::post('/user/password/update', [UserController::class,'UserPasswordUpdate'])->name('user.password.update');
   
});
require __DIR__.'/auth.php';
///admin group middleware
Route::middleware(['auth','role:admin'])->group(function(){
Route::get('/admin/dashboard', [AdminController::class,'AdminDashbord'])->name('admin.dashbord');
Route::get('/admin/logout', [AdminController::class,'AdminLogout'])->name('admin.logout');
Route::get('/admin/profile', [AdminController::class,'AdminProfile'])->name('admin.profile');
Route::post('/admin/profile/store', [AdminController::class,'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminController::class,'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/update/password', [AdminController::class,'AdminUpdatePassword'])->name('admin.update.password');

});///eand for admin
///agent group midleware
Route::middleware(['auth','role:agent'])->group(function(){
Route::get('/agent/dashboard',[AgentController::class,'AgentDashboard'])->name('agent.dashbord');
Route::get('/agent/logout', [AgentController::class,'AgentLogout'])->name('agent.logout');
Route::get('/agent/profile', [AgentController::class,'AgentProfile'])->name('agent.profile');
Route::post('/agent/profile/store', [AgentController::class,'AgentProfileStore'])->name('agent.profile.store');
Route::get('/agent/change/password', [AgentController::class,'AgentChangePassword'])->name('agent.change.password');
Route::post('/agent/update/password', [AgentController::class,'AgentUpdatePassword'])->name('agent.update.password');
});//end group for agent
Route::get('/admin/login', [AdminController::class,'AdminLogin'])->name('admin.login');
///admin group middleware
Route::middleware(['auth','role:admin'])->group(function(){
    //property type all route
    Route::controller(ProperttyTypeController::class)->group(function(){
        Route::get('/all/type','AllType')->name('all.type');
        Route::get('/add/type','AddType')->name('add.type');
        Route::post('/store/type','StoreType')->name('store.type');
        Route::get('/edit/type/{id}','EditType')->name('edit.type');
        Route::post('/update/type/','UpdateType')->name('update.type');
        Route::get('/delete/type/{id}','DeleteType')->name('delete.type');
    }); 
    //aminitie all route
    Route::controller(ProperttyTypeController::class)->group(function(){
        Route::get('/all/amenitie','AllAmenitie')->name('all.amenitie');
        Route::get('/add/amenitie','AddAmenitie')->name('add.Amenitie');
        Route::post('/store/aminities','StoreAminities')->name('store.aminities');
        Route::get('/edit/eminitie/{id}','EditEminitie')->name('edit.eminitie');
        Route::post('/update/eminitie/','UpdateAminitie')->name('update.eminitie');
        Route::get('/delete/eminitytype/{id}','DeleteEminities')->name('delete.eminitie');
    }); 
    Route::controller(PropertyController::class)->group(function(){
        Route::get('/all/property','AllProperty')->name('all.property');
        Route::get('/add/property','AddProperty')->name('add.property');
        Route::Post('/store/property','StoreProperty')->name('store.property');
     
    }); 
    //permission all route
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission','AllPermission')->name('all.permission');
        Route::get('/add/permission','AddPermission')->name('add.permission');
        Route::post('/store/permission','StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}','EditPermission')->name('edit.permission');
        Route::get('/delete/permission/{id}','DeletePermission')->name('delete.permission');
        Route::post('/update/permission','UpdatePermission')->name('update.permission');
        Route::get('/import/permission','ImportPermission')->name('import.permission');
        Route::get('/export','Export')->name('export');
        Route::post('/import','Import')->name('import');
    }); 
    //permission all route
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/roles','AllRoles')->name('all.roles');
        Route::get('/add/roles','AddRoles')->name('add.roles');
        Route::post('/store/roles','StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}','EditRoles')->name('edit.roles');
        Route::get('/delete/roles/{id}','DeleteRoles')->name('delete.roles');
        Route::post('/update/roles','UpdateRoles')->name('update.roles');
        Route::get('/add/roles/permission','AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store','RolePermissionStore')->name('role.permission.store');
        Route::get('/all/role/permission','AllRolePermission')->name('all.role.permission');
    }); 
    });///eand for group admin middlewere
