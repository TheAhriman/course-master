<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    @vite('resources/css/header.css')
    @vite('resources/css/main-side-bar-menu.css')
    @vite('resources/css/course.css')
    @vite('resources/css/footer.css')

    <title>page-course</title>
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
                    <a href="file:///C:/Users/user/Desktop/Course%20Master/pages/login-form.html" class="exite_link">Войти</a>
                    <a href="file:///C:/Users/user/Desktop/Course%20Master/pages/form-registration.html" class="exite_link">Регистрация</a>
                </div>
            </div>
        </div>
    </header>
    <div class="wraper">
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="../pictures/images/photo.jpg" alt="logo">
                    </span>
                    <div class="text header-text">
                        <span class="profession">Frontend</span>
                    </div>
                </div>

            </header>
            <div class="menu-bar">
                <div class="menu">
                    <li class="search-box">
                        <i class='bx bx-search icon'></i>
                        <input type="search" placeholder="Поиск...">
                    </li>
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">Введение</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">HTML Урок 1</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">HTML Урок 2</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">HTML Урок 3</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">CSS Урок 1</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">CSS Урок 2</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">CSS Урок 3</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">SCSS Урок 1</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">React Урок 1</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">VueJS Урок 1</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bottom-content">
                    <li class="nav-link">
                        <a href="https://boxicons.com/?query=book" class="out_link">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Главная</span>
                        </a>
                    </li>
                </div>
            </div>
        </nav>
        <section class="home">
            <div class="home-content">
                <h1>URI.URL.URN</h1>
                <br>
                <p>В чем разница между URI и URL? Мы все используем много URL-адресов ежедневно. Иногда мы их набираем,
                    иногда мы просто переходим на один URL из другого.</p>
                <p>Для начала давайте расшифруем аббревиатуры:</p>
                <ul>
                    <li><span>URI - Uniform Resource Identifier</span> (унифицированный идентификатор ресурса)</li>
                    <li><span>URI - Uniform Resource Identifier</span>(унифицированный определитель местонахождения
                        ресурса)</li>
                    <li><span>URI - Uniform Resource Identifier</span>(унифицированный определитель местонахождения
                        ресурса)</li>
                </ul>
                <p>Многие считают, что http://google.com или http://yandex.ru - это просто URL-адреса, но, однако мы
                    можем говорить о них как о URI. Фактически, URI представляет собой расширенный набор URL-адресов и
                    нечто, называемое URN. Таким образом, мы можем с уверенностью заключить, что все URL являются URI.
                    Однако обратное неверно.</p>
                <p>Твое имя, скажем, “Джон Доу” - это URN. Место, в котором вы живете, например, “Улица Вязов, 13” – это
                    уже URL. Вы можете быть идентифицированы как уникальное лицо с вашим именем или вашим адресом. Эта
                    уникальная личность – это уже URI. И хотя ваше имя может быть вашим уникальным идентификатором
                    (URI), оно не может быть URL-адресом, поскольку ваше имя не помогает найти ваше местоположение.
                    Другими словами, URI (которые являются URN) не являются URL-адресами.</p>
                <p>Вернемся в интернет:</p>
                <ul>
                    <li><span>URL</span>– имя и адрес ресурса в сети, включает в себя URL и URN</li>
                    <li><span>URL</span>– адрес ресурса в сети, определяет местонахождение и способ обращения к нему
                    </li>
                    <li><span>URL</span>– имя ресурса в сети, определяет только название ресурса, но не говорит как к
                        нему подключиться</li>
                </ul>
                <p>Рассмотрим примеры:</p>
                <ul>
                    <li><span>URL</span> – https://wiki.merionet.ru/images/vse-chto-vam-nuzhno-znat-pro-devops/1.png
                    </li>
                    <li><span>URL</span>- https://wiki.merionet.ru</li>
                    <li><span>URL</span> - images/vse-chto-vam-nuzhno-znat-pro-devops/1.png</li>
                </ul>
                <p>Как вы видите – первые две сточки в вашем браузере отобразились как ссылки и по ним можно перейти,
                    однако по третьей сточке нельзя, потому что непонятно как и куда.</p>
                <p>Как это можно показать наглядно:</p>
                <img src="../pictures/images/url.png" alt="">
                <p>URI обозначает Uniform Resource Identifier и по сути является последовательностью символов, которая
                    идентифицирует какой-то ресурс. URI может содержать URL и URN.</p>
                <p></p>
                <ul>
                    <li><span>URL</span> – https://wiki.merionet.ru/images/vse-chto-vam-nuzhno-znat-pro-devops/1.png
                    </li>
                    <li><span>URL</span>- https://wiki.merionet.ru</li>
                    <li><span>URL</span> - images/vse-chto-vam-nuzhno-znat-pro-devops/1.png</li>
                </ul>
                <p>Общий синтаксис URI выглядит так:</p>
                <p><span>URI = scheme ":" hier-part [ "?" query ] [ "#" fragment ]</span></p>
                <p>Теперь, когда мы знаем, что такое URI, URL тоже должен быть достаточно понятным. Всегда помните - URI
                    может содержать URL, но URL указывает только адрес ресурса.</p>
                <p>URI содержит в себе следующие части:</p>
                <ul>
                    <li><span>Схема (scheme) - </span>Протокол, который используется для доступа к ресурсу – http,
                        https, ftp</li>
                    <li><span>Иерархическая часть (hier-part) - </span>Расположение сервера с использованием IP-адреса
                        или имени домена - например, wiki.merionet.ru - это имя домена.</li>
                    <li><span>Запрос (query) - </span>Точное местоположение в структуре каталогов сервера. Например -
                        https://wiki.merionet.ru/ip-telephoniya/ - это точное местоположение, если пользователь хочет
                        перейти в раздел про телефонию на сайте.</li>
                    <li><span>Фрагмент (fragment) - </span>Необязательный идентификатор фрагмента. Например,
                        https://www.google.com/search?ei=qw3eqwe12e1w&q=URL, где q = URL - это строка запроса, введенная
                        пользователем.</li>
                </ul>
                <p>Синтаксис:</p>
                <p>[protocol]://www.[domain_name]:[port 80]/[path or exaction resource location]?[query]#[fragment]</p>
                <div class="coments">
                    <div class="comments-container">
                        <div class="comments-title">
                            <div class="likes-dislike">
                                <div class="like">
                                    <i class='bx bxs-like icon'></i><span class="cont-like">0</span>
                                </div>
                                <div class="dislike">
                                    <i class='bx bxs-dislike icon'></i><span class="count-dislike">0</span>
                                </div>
                                <div class="lesson">
                                    <span class="lesson-text">Урок<span class="count-lesson"> 1</span></span>
                                </div>
                            </div>
                            <div>
                                <button class="next-lesson">Следующий урок &#9658</button>
                            </div>
                        </div>
                        <div class="comments-filter">
                            <div class="block-coments-count">
                                <span>Комментариев</span><span class="coments-count">1</span>
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
                            <div class="likes-dislikes-comment">
                                <div class="like-coment" id="like">
                                    <i class='bx bxs-like icon'></i><span class="count-likes-comments">0</span>
                                </div>
                                <div class="dislike-coment" onclick="incrementClick()">
                                    <i class='bx bxs-dislike icon'></i><span class="count-dislikes-comments">0</span>
                                </div>
                                <div>
                                    <a href="#" class="comment-link-answer" id="dislike">Ответить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
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
    <script src="../js/components/side-bar-menu.js"></script>
    <script src="../js/components/drop-down-comments.js"></script>

</body>

</html>
