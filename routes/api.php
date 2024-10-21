<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//dsfsdfsd
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/contacts', \App\Http\Controllers\ContactController::class)->names('contacts');

Route::post('/user/upload-image',[\App\Http\Controllers\ContactController::class,'uploadImage'])->name('contact.image-upload');
