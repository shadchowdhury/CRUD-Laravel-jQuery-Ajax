<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\EmployeeController;


Route::get('/',function(){
    return view('frontend.home');
});


//*******- For Product Only Laravel -*******
Route::get('/addproduct',[ProductController::class,'addproduct'])->name("addproduct");
Route::post('/productstore',[ProductController::class,'productstore'])->name("productstore");
Route::get('/showproduct',[ProductController::class,'showproduct'])->name("showproduct");
Route::get('/editproduct/{id}',[ProductController::class,'editproduct'])->name("editproduct");
Route::post('/update/{id}',[ProductController::class,'update'])->name("update");
Route::get('/delete/{id}',[ProductController::class,'delete'])->name("delete");

Route::get('/status/{id}',[ProductController::class,'status'])->name("status");


//*******- For Employee with AJAX -*******
Route::get('/addemployee',[EmployeeController::class,'index'])->name("addemployee");
Route::post('/employeestore',[EmployeeController::class,'store']);
Route::get('/showemployee',[EmployeeController::class,'show']);
Route::get('/employeedelete/{id}',[EmployeeController::class,'destroy']);
Route::get('/employeeEdit/{id}',[EmployeeController::class,'edit']);
Route::post('/updateemployee/{id}',[EmployeeController::class,'update']);

Route::get('/changestatus/{id}',[EmployeeController::class,'statusChng']);


// Route::get('/contact',function(){
//     return view('frontend.contact');
// })->name("contact");
