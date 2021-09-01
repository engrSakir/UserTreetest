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


    $parent = User::where('own_ref', $request->reference)->first();

    if($parent->left_user == null){
        $parent = $parent;
        $position = 'left';
    }else if($parent->right_user == null){
        $parent = $parent;
        $position = 'right';
    }else{
        // $parent_left = User::where('using_ref', $request->reference)->where('left_user', null)->first();
        // $parent_right = User::where('using_ref', $request->reference)->where('right_user', null)->first();

        // if($parent_left->id <= $parent_right->id){
        //     $parent = $parent_left;
        // }else{
        //     $parent = $parent_right;
        // }

        $parent_left = $parent->childs()->where('left_user', null)->first();
        $parent_right = $parent->childs()->where('right_user', null)->first();

        if($parent_left->id <= $parent_right->id){
            $parent = $parent_left;
        }else{
            $parent = $parent_right;
        }

        //dd($parent);

        if($parent->left_user == null){
            $parent = $parent;
            $position = 'left';

        }else if($parent->right_user == null){
            $parent = $parent;
            $position = 'right';
        }else{
            //All of child's leg are full by child's referral code. So that new member (Try to cheare use admin's referral). Place not defined.
            dd("This one is unknown login.");
        }
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
    if($position == 'left'){
        $parent->left_user = $user->id;
    }else{
        $parent->right_user = $user->id;
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
