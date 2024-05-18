<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(ApiUserController::class)
->prefix("/users")
->group(function () {

    Route::get("/", "index");
    Route::get("/{id}", "show");
    Route::post("/", "store");
    Route::put("/{id}", "update");
    Route::delete("/{id}", "destroy");
    
});


Route::get('/basic-auth', function(Request $request){

    $username = "siswa1";
    $password = "siswa123";

    $token = $request->header('authorization');
    $token = str_replace('Basic','',$token);

    $credential = "{$username}:{$password}";

    return base64_decode($token) === $credential ? 'yes' : 'no';  
});

Route::post('/login',[ApiAuthController::class,'login']);
Route::post('/logout',[ApiAuthController::class,'logout']);

Route::get('profile',function(Request $request){
    return $request->userCredential;    
})->middleware(['api-auth']);