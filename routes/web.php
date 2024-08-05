<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\noteController; // Подключение контроллера
 
// URL домашней страницы с функцией отображения всех блогов из таблицы
Route::get("/", [noteController::class, "viewNote"])->name("view_note");

// URL для обработки формы оставки заметки
Route::post("/add_note", [noteController::class, "addNote"])->name("add_note");