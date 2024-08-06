<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/index.css') }}">
    <title>SimplyBlog</title>
</head>
<body>
    <!-- Подключение шапки сайта -->
    @include("blocks.header")
    <!-- Подключение домашней страницы -->
    @yield("main")
    <!-- Подключение формы редактирования -->
    @yield("edit_note")
</body>
</html>