<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/plan', function () {
    return view('plans', ['fname' => 'First Name', 'lname' => 'Last Name',
                          'email' => 'AAA@gmail.com', 'phone' => '617283823']);
});

Route::get('/designIdea', function () {
    return view('designIdea', ['fname' => 'First Name', 'lname' => 'Last Name',
                          'email' => 'AAA@gmail.com', 'phone' => '617283823']);
});
Route::get('/joinOurTeam', function () {
    return view('joinOurTeam', ['fname' => 'First Name', 'lname' => 'Last Name',
                          'email' => 'AAA@gmail.com', 'phone' => '617283823']);
});
Route::get('/contact', function () {
    return view('contact', ['fname' => 'First Name', 'lname' => 'Last Name',
                          'email' => 'AAA@gmail.com', 'phone' => '617283823']);
});
Route::get('/misc', function () {
    return view('misc', ['fname' => 'First Name', 'lname' => 'Last Name',
                          'email' => 'AAA@gmail.com', 'phone' => '617283823']);
});
Route::get('/login', function () {
    return view('login');
});