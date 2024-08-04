<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\noteController; // Подключение контроллера

// URL домашней страницы
Route::get('/', function () {
    return view('main');
})->name("main");

// URL для обработки формы оставки заметки
Route::post("/add_note", [noteController::class, "addNote"])->name("add_note");