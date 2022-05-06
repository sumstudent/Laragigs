<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

//All Listings
Route::get("/", [ListingController::class, "index"]);

//Show create form
Route::get("/listings/create", [ListingController::class, "create"])->middleware('auth');

//Store Listing from form
Route::post("/listings", [ListingController::class, "store"])->middleware('auth');

//Show Edit form
Route::get("/listings/{listing}/edit", [ListingController::class, "edit"])->middleware('is_admin');

//Manage listing and Show Manage listing page
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('is_admin');

//Update listing
Route::put("/listings/{listing}", [ListingController::class, "update"])->middleware('auth');

//Show Delete form
Route::delete("/listings/{listing}", [ListingController::class, "delete"])->middleware('is_admin');

//Single Listing
Route::get("/listings/{listing}", [ListingController::class, "show"]);

//Show Register create form
Route::get("/register", [UserController::class, "create"])->middleware('guest');

//Create new user
Route::post("/users", [UserController::class, "store"]);

//Log User out
Route::post("/logout", [UserController::class, "logout"])->middleware('auth');

//Show login form
Route::get("/login", [UserController::class, "login"])->name('login')->middleware('guest');

//Log in User
Route::post('/users/authenticate', [UserController::class, "authenticate"]);



/**
 * Common Resource Routes:
 * index - show all listings ;
 * show - show single listing ;
 * create - show form to create new listing --
 * store - store new listing --
 * edit -show form to edit listing --
 * update - udapte listing --
 * destroy - delete listing
 */
