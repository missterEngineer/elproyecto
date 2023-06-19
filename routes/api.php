<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// ROUTES USERS
Route::get("/getusuarios", "ControllersUsuarios@get");
Route::post("/cretenewuser", "ControllersUsuarios@create");
Route::put("/updateuser", "ControllersUsuarios@update");
Route::post("/deleteuser", "ControllersUsuarios@destroy");


// ROUTES BIENES
Route::get("/getbienes", "ControllersBienes@get");
Route::get("/gethistory", "ControllersBienes@getHistoryArticle");
Route::post("/createbienes", "ControllersBienes@create");
Route::post("/deleteBienes", "ControllersBienes@destroy");
Route::post("/getselect", "ControllersBienes@getSelect");
Route::put("/updatearticulo", "ControllersBienes@update");

Route::post("/getfilterarticleasig", "ControllerAssigned_goods@getFilterAssigneGoods");


Route::get("/getarticulos-entregados", "ControllerAssigned_goods@getAssignedGoods");
Route::post("/asigbienes", "ControllerAssigned_goods@asigne");

Route::post("/returnarticulo", "ControllerAssigned_goods@reEntry");

Route::get("/getonestaff", "ControllersStaffs@getOne");


Route::get("/getlog", "ControllerLog@getAll");


// Route::post("/createBienes", "Bienes@create");
