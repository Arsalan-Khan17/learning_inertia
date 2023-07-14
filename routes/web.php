<?php

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
    $data['users'] = \App\Models\User::paginate(15)->through(fn($user) => [
        'name' => $user->name,
        'id' => $user->id
    ]);
    return Inertia::render('Users',$data);
});

Route::get('/settings', function () {
    return Inertia::render('Setting');
});

Route::post('/logout', function () {
    dd('logging out');
});

