<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\WebController;

Route::post('/login',function (Request $request){
    $request->validate([
        'email'=>'required|email',
        'password'=>'required'
    ]);
    $admin = Admin::where('email',$request->email)->first();
    if(!$admin || !Hash::check($request->password,$admin->password)){
        return response()->json(['error'=>'Invalid credentials'],401);
    }

    $token = Auth::guard('api')->login($admin);
    return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth('api')->factory()->getTTL() * 60
    ]);
});

Route::middleware(['auth:api'])->get('/admin/me', function (Request $request) {
    return response()->json($request->user());
});

Route::middleware(['auth:api'])->prefix('admin')->group(function () {
    Route::get('/blogs',[ApiController::class,'getBlogs']);
    Route::get('/galleries',[ApiController::class,'getGalleries']);
    Route::get('/website',[ApiController::class,'getWebsite']);
});
