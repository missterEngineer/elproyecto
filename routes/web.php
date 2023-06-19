<?php





Route::get('/', function () {
    return view('login');
})->name("login")->middleware("guest");


Route::get('/inicio', function () {
    return view('home');
})->name("inicio")->middleware("auth");

Route::get('/home', function () {
    return redirect("inicio");
});

Route::get('/usuarios', function () {
    return view('usuarios');
})->name("usuarios")->middleware("auth");

Route::get('/articulos', function () {
    return view('bienes');
})->name("articulos")->middleware("auth");

Route::get('/articulos-entregados', function () {
    return view('articulosEntregados');
})->name("articulos-entregados")->middleware("auth");

Route::get('/reportes', function () {
    return view('reportes');
})->name("reportes")->middleware("auth");

Route::get('/bitacora', function () {
    return view('log');
})->name("log")->middleware("auth");


// PDF
Route::get('/PDF-users', "ControllersPDF@createPDFUsers")->name("pdf-users");

Route::get('/PDF-articulos', "ControllersPDF@createPDFArticulos")->name("pdf-articulos");

Route::get('/PDF-articulos-entregados', "ControllersPDF@createPDFArticulosEntregados")->name("pdf-articulos-entregados");

Route::get('/PDF-articulo-historia', "ControllersPDF@createPDFArticuloHistoria")->name("pdf-articulos-historia");

Route::get('/PDF-articulo-log', "ControllersPDF@createPDFLog")->name("/PDF-articulo-log");


Route::post('/logout', "Auth\LoginController@logout")->name("logout");

Route::post("login", "Auth\LoginController@login")->name("login");






