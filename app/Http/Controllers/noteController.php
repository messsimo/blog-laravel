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
        return redirect()->route("main")->with("success", "Заметка успешно добавлена!");
    }

}
