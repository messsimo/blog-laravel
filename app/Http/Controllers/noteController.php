<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\noteRequest; // Подключение модуля
use Illuminate\Support\Facades\Session; // Подключение фасада Session
use App\Models\notes; // Подключение модели

class noteController extends Controller {
    public function addNote(noteRequest $req) {
        // Добавление данных в таблицу
        $note = new notes();
        $note->name = $req->input("name");
        $note->header = $req->input("header");
        $note->note = $req->input("note");
        $note->save();

        // Установка значения в сессию
        Session::put("ket", "success");
        // Установка сообщения
        Session::flash("success", "Заметка успешно добавлена!");
        // Вывод успешной сессии
        return redirect()->route("view_note")->with("success", "Заметка успешно добавлена!");
    }

    // Функция вывода всех блогов
    public function viewNote() {
        // Получение всех данных из таблицы
        $notes = notes::all();

        // Передача ключа с информацией в шаблон
        return view("main", ["notes" => $notes]);
    }
}


