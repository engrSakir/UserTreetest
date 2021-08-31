<?php

use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
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
    $data = user_tree(1);
    //last_left_child();
    //dd($data);

    return view('welcome', compact('data'));
});

Route::get('/user/{user_id}', function ($user_id) {
    $data = user_tree($user_id);
    //dd($data);
    return view('welcome', compact('data'));
})->name('selsctUser');

Route::get('/create', function () {
    return view('create');
});

Route::post('/create', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'reference' => 'required|string|exists:users,own_ref',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt('password');
    $user->own_ref = Str::random(4);
    $user->using_ref = $request->reference;
    $user->save();

    $l_parent = User::where('left_user', null)->first();
    $r_parent = User::where('right_user', null)->first();

    if($l_parent->id <= $r_parent->id){
        $l_parent->left_user = $user->id;
        $l_parent->save();
    }else{
        $r_parent->right_user = $user->id;
        $r_parent->save();
    }

    return back();
})->name('storeUser');

Route::post('/carry-update', function (Request $request) {
    $request->validate([
        'user' => 'required|exists:users,id',
        'carry_'.$request->user => 'required',
    ]);

    carry_increment($request->user, $request->input('carry_'.$request->user));
    return back();
})->name('updateCarry');
