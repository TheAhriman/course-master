<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu&display=swap"  rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/header.css')
    @vite('resources/css/about-course.css')
    @vite('resources/css/footer.css')
    <title>О курсе</title>
</head>

<body>
    <header class="header">
        <div class="header_container">
            <div class="header_nav_menu">
                <a href="#" class="link_logo">Course<span class="linl_logo_span">Master</span></a>
                <a href="index.blade.php" class="header_link">Главная</a>
                <a href="#" class="header_link">Обучение</a>
                <a href="file:///C:/Users/user/Desktop/Course%20Master/pages/page-all-courses.html" class="header_link">Мои курсы</a>
            </div>
            <div class="header_nav_buttons">
                <input type="search" class="header_search" placeholder="Поиск...">
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">Язык</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="#">Русский</a>
                        <a href="#">Английский</a>
                    </div>
                </div>
                <div class="exite_links">
                    <a href="login-form.blade.php" class="exite_link">Войти</a>
                    <a href="file:///C:/Users/user/Desktop/Course%20Master/pages/form-registration.html"
                        class="exite_link">Регистрация</a>
                </div>
            </div>
        </div>
    </header>
    <div class="main-content">
        <div class="content">
            <div class="content-about-course">
                <h1>О курсе</h1>
                <p>Присоединяйтесь к официальному telegram-каналу "Поколение Python" по ссылке.</p>
                <p>"Поколение Python": курс для начинающих знакомит школьников и всех, кому это интересно, с
                    программированием. </p>
                <p>Выбран Python за ясность кода и быстроту реализации на нем программ.</p>
                <p>Цель курса – формирование базовых понятий структурного программирования.В нем 8 модулей с
                    теоретическими и практическими материалами и заданиями.</p>
                <p>Решения проверяет автоматическая система, поэтому обратную связь вы получите быстро. Если у вас
                    возникнут вопросы, команда курса даст советы и подсказки. Кроме того, проблемы можно обсуждать с
                    однокурсниками в комментариях к задачам.</p>
                <p>Сертификат о прохождении этого курса позволяет участвовать в конкурсе «Талант 20.35»</p>
                <p>Сертификат о прохождении этого курса позволяет участвовать в конкурсе «Талант 20.35»</p>
                <p>Этот курс – первый из серии "Поколение Python", в которую также входят Курс для продвинутых и Курс
                    для профессионалов.</p>
            </div>
            <div class="content-for-whom">
                <h1>Для кого предназначен курс</h1>
                <p>Курс рассчитан на школьников и всех желающих познакомиться с программированием.</p>
            </div>
            <div class="requirements">
                <h1>Что нужно знать для начала?</h1>
                <p>Для освоения курса требуются базовые знания из школьной программы по информатике и математике.</p>
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
    <footer class="footer">
        <div class="footer_conteiner">
            <div class="footer_container_1">
                <div class="footer_container_1_media">
                    <a href="#" class="logo">Course<span class="span_logo">Master</span></a>
                    <div class="footer_container_1_media_icons">
                        <a href=""><img src="../pictures/icons/whatsapp.svg" alt=""></a>
                        <a href=""><img src="../pictures/icons/messanger.svg" alt=""></a>
                        <a href=""><img src="../pictures/icons/facebook.svg" alt=""></a>
                        <a href=""><img src="../pictures/icons/twitter.svg" alt=""></a>
                        <a href=""><img src="../pictures/icons/youtube.svg" alt=""></a>
                    </div>
                </div>
                <div class="footer_container_date">
                    <a href="#" class="footer_container_date_text">Политика обработки персональных данных </a>
                    <a href="#" class="footer_container_date_text">Политика конфиденциальности</a>
                    <a href="#" class="footer_container_date_text">Пользовательское соглашение </a>
                    <a href="#" class="footer_container_date_text">Публичная оферта </a>
                    <a href="#" class="footer_container_date_text">Обратная связь</a>
                    <a href="#" class="footer_container_date_text">О нас</a>
                </div>
            </div>
            <div class="footer_conteiner_2">
                <a class="footer_container_span">Информация:</a>
                <div class="footer_container_date_info">
                    <a class="footer_container_span">Адрес:<span class="footer_container_date_text"> Новооктябрьская 14,
                            г. Гродно</span></a>
                    <a class="footer_container_span">телефон:<span class="footer_container_date_text">
                            +375299999999</span></a>
                    <a class="footer_container_span">Email:<span class="footer_container_date_text">
                            course.master@gmail.com</span></a>
                </div>
            </div>
        </div>
        <p class="autor">© Все права защищены <span class="autor_pictures">&#10084;</span>. Сделано с помощью Laravel
        </p>
    </footer>
    <script src="../js/components/drop-down-language.js"></script>
</body>

</html>
