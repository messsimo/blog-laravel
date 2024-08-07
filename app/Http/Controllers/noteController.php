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
        // Получение всех данных из таблицы c определнным кол-во на страницу
        $notes = notes::paginate(5);

        // Передача ключа с информацией в шаблон
        return view("main", ["notes" => $notes]);
    }

    // Функция обработки формы редактирования заметки
    public function editNoteform($id) {
        $note = new notes();

        // Возвращение данных из таблицы по id
        return view("edit_note", ["note" => $note->find($id)]);
    }

    // Функция редактирования формы
    public function editNote($id, noteRequest $req) {
        $note = notes::find($id);

        // Обновление записи
        $note->name = $req->input("name");
        $note->header = $req->input("header");
        $note->note = $req->input("note");
        $note->save();

        // Установка значения в сессию
        Session::put("ket", "edit");
        // Установка сообщения
        Session::flash("edit", "Заметка успешно обновлена!");

        return redirect()->route("view_note")->with("edit", "Заметка #$id успешно обновлена!");
    }

    // Функция для удаления блога
    public function deleteNote($id) {
        // Удаление блога
        notes::find($id)->delete();

        // Установка значения в сессию
        Session::put("ket", "edit");
        // Установка сообщения
        Session::flash("edit", "Заметка успешно удалена!");
        
        return redirect()->route("view_note")->with("edit", "Заметка #$id успешно удалена!");
    }
 }


