<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home',[
        'name' => 'John Doe'
    ]);
});

Route::get('/users', function () {
    $data['users'] = User::query()
        ->when(Request::input('search'),function ($query,$search){
            $query->where('name','like',"%{$search}%");
        })
        ->paginate(15)
        ->withQueryString()
        ->through(fn($user) => [
        'name' => $user->name,
        'id' => $user->id
        ]);
    $data['filters'] = Request::only(['search']);
    return Inertia::render('Users/Index',$data);
});

Route::get('/users/create', function () {
    return Inertia::render('Users/Create');
});

Route::post('/users', function () {

    $attributes =  Request::validate([
       'name' => 'required',
       'email' => 'required|email',
       'password' => 'required',
    ]);

   User::create($attributes);
   return redirect('/users');
});
Route::get('/settings', function () {
    return Inertia::render('Setting');
});

Route::post('/logout', function () {
    dd('logging out');
});

