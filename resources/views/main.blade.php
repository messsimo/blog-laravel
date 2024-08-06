<!-- Подключение файла сборщика (App) -->
@extends("layouts.app")

<!-- Секция домашиния страницы -->
@section("main")
<div class="form">
    <h1>Добавить новый блог</h1>
    <form action="{{ route('add_note') }}" method="post">
        <!-- Ключ безопасности -->
        @csrf 

        <label for="name">Ваше имя</label><br>
        <input type="text" name="name" placeholder="Ваше имя" id="name"><br>

        <label for="header">Тема заметки</label><br>
        <input type="text" name="header" id="header" placeholder="Тема заметки"><br>

        <label for="note">Сообщение</label><br>
        <textarea name="note" id="note" placeholder="Сегодня я.."></textarea><br>

        <!-- Отображение ошибки -->
        @if ($errors->any())
            <div class="alert-danger">
                @foreach ($errors->all() as $el)
                    <p>{{ $el }}</p>
                @endforeach
            </div>
        @endif

        <!-- Отображение успешного действия -->
        @if (session("success"))
            <div class="alert-success">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <button type="submit">Выложить заметку</button>
    </form> 
</div>

<div class="container-notes">
    <h1>Блоги</h1>

    <div class="container-blocks">
        <!-- Вывод оповещения о редактрование блога -->
        @if (session('success_edit'))
            <div class="alert-success blog-allert-success">
                <span>{{ session('success_edit') }}</span>
            </div>
        @endif

        <!-- Вывод информации из таблицы базы данных -->
        @foreach ($notes as $el)
        <div class="block">
            <div class="controllers">
                <a href="" class="delete">Удалить</a>
                <a href="{{ route('edit_noteForm', $el->id) }}">Редактировать</a>
            </div>

            <h4>{{ $el->header }}</h4>
            <span>{{ $el->name }}</span>
            <span class="id">ID: {{ $el->id }}</span>

            <p>{{ $el->note }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection