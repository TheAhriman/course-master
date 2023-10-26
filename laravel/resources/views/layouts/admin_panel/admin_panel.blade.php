<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Simple Sidebar - Start Bootstrap Template</title>
    <!-- Favicon-->
    <!--<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />-->
    <!-- Core theme CSS (includes Bootstrap)-->
    @vite(['resources/js/app.js','resources/css/styles.css','resources/css/app.css','resources/js/scripts.js'])
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">Admin panel</div>
        <div class="list-group list-group-flush">
            @role('admin')
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.categories.index')}}">Категории</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.users.index')}}">Пользователи</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.roles.index')}}">Роли</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.comments.index')}}">Комментарии</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.question_groups.index')}}">Группа вопросов</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.user_answers.index')}}">Ответы пользователей</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.permissions.index')}}">Разрешения</a>
            @endrole
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.courses.index')}}">Курсы</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.lessons.index')}}">Уроки</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.lesson_contents.index')}}">Содержимое уроков</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.examinations.index')}}">Тесты</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.criterias.index')}}">Критерии оценки</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.questions.index')}}">Вопросы</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.question_responses.index')}}">Ответы на вопросы</a>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                @yield('navbar')
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item active"><a class="nav-link" href="{{route('home')}}">На главную</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Поделиться</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#!">Action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" onclick="document.getElementById('logout-form').submit();" type="submit">Выйти</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
