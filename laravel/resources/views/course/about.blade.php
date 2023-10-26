@extends('layouts.app0')
@vite('resources/css/about-course.css')
@section('content')
<div class="main-content">
    <div class="content">
        <div class="content-about-course">
            <h1>О курсе</h1>
            {!! $aboutCourse->value !!}
        </div>
        <div class="content-for-whom">
            <h1>Для кого предназначен курс</h1>
            {!! $aboutCourse->audience !!}
        </div>
        <div class="requirements">
            <h1>Что нужно знать для начала?</h1>
            {!! $aboutCourse->requirements !!}
        </div>
        <div class="autor-vidget">
            <img src="../pictures/images/photo.jpg" alt="" class="img-autor">
            <div class="vidget-about-autor">
                <div class="autor-vidget-content">
                    <a href="#" class="autor-link-vidget">Евгений Козич</a>
                    <p>Профессионально обучаю работе с графическими редакторами Adobe, преподаю дизайн и веб разработку.</p>
                    <p>Обучил более 15000 студентов по всему миру на своих авторских онлайн курсах. Более 6000 реальных
                        отзывов со средней оценкой 4,83 из 5.00! Я преподаю веб дизайн, веб разработку и необходимое ПО
                        (Photoshop Illustrator, Figma). Мой опыт преподавания складывается из 5 лет репетиторства на
                        фрилансе, а так- же преподавания через онлайн школы и курсы, на мировых площадках по
                        дистанционному обучению. Студенты моих курсов, отмечают лучшие мои качества в том, как я
                        преподаю материал без зубрежки, весело и интересно.</p>
                </div>
            </div>
        </div>
        <div class="lessons">
            <h1>Программа курса</h1>
            <ul>
                <li>Общая инфомация</li>
                <li>Ввод-вывод данных</li>
                <li>Условный оператор</li>
                <li>Типы данных</li>
                <li>Циклы For и While</li>
                <li>Строковый тип данных</li>
                <li>Списки</li>
                <li>Массивы</li>
                <li>Функции</li>
                <li>Заключение</li>
            </ul>
        </div>
        <div class="actions">
            <button class="btn-join">Присоедениться</button>
            <button class="btn-favourites">&#9825; В избранное</button>
        </div>
        <hr>
        <div class="coments">
            <div class="comments-container">
                <div class="comments-filter">
                    <div class="block-coments-count">
                        <span>Комментариев</span><span class="coments-count"> 1</span>
                    </div>
                </div>
                <div class="comments-insert">
                    <input type="text" placeholder="Введите комментарий" class="input-comment">
                    <button class="button-insert">Опубликовать</button>
                </div>
                <div class="block-comments">
                    <div class="title-comments">
                        <a href="#" class="autor-comment">Евгений Козич</a><span
                            class="comment-date">20.08.2019</span>
                    </div>
                    <div class="comments-content">Всё отлично и понятно!</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
