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
    @vite('resources/css/course-content.css')
    @vite('resources/css/footer.css')

    <title>Содержимое курса</title>
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
                    <a href="file:///C:/Users/user/Desktop/Course%20Master/pages/login-form.html"
                        class="exite_link">Войти</a>
                    <a href="file:///C:/Users/user/Desktop/Course%20Master/pages/form-registration.html"
                        class="exite_link">Регистрация</a>
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
                        <span class="profession">Название</span>
                    </div>
                </div>
            </header>
            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">Описание</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="file:///C:/Users/user/Desktop/Course%20Master/pages/lesson-constuctor.html">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">Уроки</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">Аналитика</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">Настройки</span>
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
        <section class="main">
            <div class="main-content">
                <div class="main-content-description">
                    <h1 class="main-content-title">Описание вашего курса. Будьте внимательны, эту информацию увидят все!
                    </h1>
                    <p class="main-content-title-description">Это описание будет всем пользователям, которые откроют страницу вашего
                        курс</p>
                    <div class="block-about-course">
                        <h1 class="main-content-title">Название</h1>
                        <p class="main-content-title-description">Frontend</p>
                    </div>
                    <div class="block-about-course">
                        <h1 class="main-content-title">О курсе</h1>
                        <p class="main-content-title-description">Присоединяйтесь к официальному telegram-каналу
                            "Поколение Python" по ссылке."Поколение Python": курс для начинающих знакомит школьников и
                            всех, кому это интересно, с
                            программированием.</p>
                    </div>
                    <div class="block-about-course">
                        <h1 class="main-content-title">Для кого предназначен</h1>
                        <p class="main-content-title-description">Для людей</p>
                    </div>
                    <div class="block-about-course">
                        <h1 class="main-content-title">Что нужно знать для начала</h1>
                        <p class="main-content-title-description">Ничего</p>
                    </div>
                    <div class="block-about-course">
                        <h1 class="main-content-title">Программа курса</h1>
                        <p class="main-content-title-description">HTML</p>
                        <p class="main-content-title-description">CSS</p>
                        <p class="main-content-title-description">SCSS</p>
                        <p class="main-content-title-description">JS</p>
                    </div>
                    <h1 class="main-content-title">Преподвалатели</h1>
                    <div class="autor-vidget">
                        <img src="../pictures/images/photo.jpg" alt="" class="img-autor">
                        <div class="vidget-about-autor">
                            <div class="autor-vidget-content">
                                <a href="#" class="autor-link-vidget">Евгений Козич</a>
                                <p class="description-autor-first">Профессионально обучаю работе с графическими
                                    редакторами Adobe, преподаю дизайн и веб разработку.</p>
                                <p class="description-autor-second">Обучил более 15000 студентов по всему миру на своих
                                    авторских онлайн курсах. Более 6000 реальных
                                    отзывов со средней оценкой 4,83 из 5.00! Я преподаю веб дизайн, веб разработку и
                                    необходимое ПО
                                    (Photoshop Illustrator, Figma). Мой опыт преподавания складывается из 5 лет
                                    репетиторства на
                                    фрилансе, а так- же преподавания через онлайн школы и курсы, на мировых площадках по
                                    дистанционному обучению. Студенты моих курсов, отмечают лучшие мои качества в том,
                                    как я
                                    преподаю материал без зубрежки, весело и интересно.</p>
                            </div>
                        </div>
                    </div>
                    <div class="liks-nav">
                        <a href="about-corse.blade.php" title="Полная страница вашего курса"
                           class="your-course">Посмотреть </a>
                        <a href="file:///C:/Users/user/Desktop/Course%20Master/pages/course-constructor.html" class="link-edit">Редактировать описание </a>
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
</body>

</html>
