<?php

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

use App\User;

Route::get('/', ['middleware' => 'auth', function () {
    // dd(app('auth')->user());
    return view('home');
}])->name('home');

Route::get('/login', ['as' => 'login', function () {
    return view('login');
}]);

Route::get('/logout', function () {
    auth()->logout();
    return redirect(route('home'));
})->name('logout');

Route::post('/login', ['as' => 'login.post', function (\Illuminate\Http\Request $request) {
    $email = $request->post('email');
    $password = $request->post('password');

    //dd(User::all()->toArray());

    /** @var \Illuminate\Database\DatabaseManager $db */
    $db = app('db');
    $error = null;
    $users = [];

    try {
        $users = $db->select('SELECT * FROM users WHERE email = "' . $email . '" AND password = "' . $password . '"');
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

    if (!$error && empty($users)) {
        $error = 'Неверное имя пользователя или пароль!';
    }

    if (count($users) > 0) {
        /** @var \Illuminate\Auth\AuthManager $auth */
        $auth = app('auth');
        $auth->login(User::find(reset($users)->id));
        return redirect(route('home'));
    }

    return view('login', [
        'email' => $email,
        'error' => $error,
    ]);
}]);