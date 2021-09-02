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
        'reference' => 'required|string|exists:users,own_ref',
    ]);

    $parent = parent_finder(User::where('own_ref', $request->reference)->first());

    if($parent == null){
        $parent = most_left_and_bottom(User::where('own_ref', $request->reference)->first());
    }

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt('password');
    $user->own_ref = Str::random(4);
    $user->using_ref = $request->reference;
    $user->parent_user = $parent->id;
    $user->save();

    //Parent update using new child record
    if($parent->left_user == null){
        $parent->left_user = $user->id;
    }else if($parent->right_user == null){
        $parent->right_user = $user->id;
    }else{
        dd('Parent not found who has empty space.');
    }
    $parent->save();

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
