<!-- Подключение файла сборщика (App) -->
@extends("layouts.app")

<!-- Секция -->
@section("edit_note")
<div class="form">
    <h1>Редактировать запись</h1>
    <form action="" method="post">
        <!-- Ключ безопасности -->
        @csrf 

        <label for="name">Ваше имя</label><br>
        <input type="text" name="name" value="{{ $note->name }}" id="name"><br>

        <label for="header">Тема заметки</label><br>
        <input type="text" name="header" id="header" value="{{ $note->header }}"><br>

        <label for="note">Сообщение</label><br>
        <textarea name="note" id="note">{{ $note->note }}</textarea><br>

        <!-- Отображение ошибки -->
        @if ($errors->any())
            <div class="alert-danger">
                @foreach ($errors->all() as $el)
                    <p>{{ $el }}</p>
                @endforeach
            </div>
        @endif

        <button type="submit">Выложить заметку</button>
    </form> 
@endsection