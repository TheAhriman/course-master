<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu&display=swap" rel="stylesheet">

    @vite('resources/css/header.css')
    @vite('resources/css/main-side-bar-menu.css')
    @vite('resources/css/index.css')
    @vite('resources/css/footer.css')

    <title>Index</title>
</head>

<body>
    <header class="header">
        <div class="header_container">
            <div class="header_nav_menu">
                <a href="#" class="link_logo">Course<span class="linl_logo_span">Master</span></a>
                <a href="index.blade.php" class="header_link">Главная</a>
                <a href="#" class="header_link">Обучение</a>
                <a href="#" class="header_link">Мои курсы</a>
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
    <div class="main-content">
        <div class="content">
            <div class="about-courses-content">
                <div class="main-content-title-course">
                    <h1 class="main-content-title">Категории на ваш выбор</h1><i class='bx bx-down-arrow-alt icon'></i>
                </div>
                <div class="block-courses">
                    <div class="name-courses">
                        <a href="#">Frontend</a>
                        <a href="#">Machine Learning</a>
                        <a href="#">Design</a>
                        <a href="#">Game Developer</a>
                        <a href="#">Ещё</a>
                    </div>
                    <div class="courses">
                        <div class="course">
                            <div class="title-course">
                                <a href="#" class="name-couse">Веб дизайн в Figma с нуля до результата! Основы UX/UI Web
                                    Design</a>
                                <br>
                                <a href="#" class="name-autor-course">Евгений Козич</a>
                            </div>
                            <img src="../pictures/images/photo.jpg" alt="" class="course-img">
                        </div>
                        <div class="course">
                            <div class="title-course">
                                <a href="#" class="name-couse">Веб дизайн в Figma с нуля до результата! Основы UX/UI Web
                                    Design</a>
                                <br>
                                <a href="#" class="name-autor-course">Евгений Козич</a>
                            </div>
                            <img src="../pictures/images/photo.jpg" alt="" class="course-img">
                        </div>
                        <div class="course">
                            <div class="title-course">
                                <a href="#" class="name-couse">Веб дизайн в Figma с нуля до результата! Основы UX/UI Web
                                    Design</a>
                                <br>
                                <a href="#" class="name-autor-course">Евгений Козич</a>
                            </div>
                            <img src="../pictures/images/photo.jpg" alt="" class="course-img">
                        </div>
                        <div class="course">
                            <div class="title-course">
                                <a href="#" class="name-couse">Веб дизайн в Figma с нуля до результата! Основы UX/UI Web
                                    Design</a>
                                <br>
                                <a href="#" class="name-autor-course">Евгений Козич</a>
                            </div>
                            <img src="../pictures/images/photo.jpg" alt="" class="course-img">
                        </div>
                        <div class="course">
                            <div class="title-course">
                                <a href="#" class="name-couse">Веб дизайн в Figma с нуля до результата! Основы UX/UI Web
                                    Design</a>
                                <br>
                                <a href="#" class="name-autor-course">Евгений Козич</a>
                            </div>
                            <img src="../pictures/images/photo.jpg" alt="" class="course-img">
                        </div>
                        <div class="course">
                            <div class="title-course">
                                <a href="#" class="name-couse">Веб дизайн в Figma с нуля до результата! Основы UX/UI Web
                                    Design</a>
                                <br>
                                <a href="#" class="name-autor-course">Евгений Козич</a>
                            </div>
                            <img src="../pictures/images/photo.jpg" alt="" class="course-img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-courses-content">
                <div class="main-content-title-course">
                    <h1 class="main-content-title">Самый топ</h1><i class='bx bx-down-arrow-alt icon'></i>
                </div>
                <div class="block-courses">
                    <div class="name-courses">
                        <a href="#">Веб-дизайн</a>
                        <a href="#">Python разработка</a>
                        <a href="#">ЕГЭ подготовка</a>
                        <a href="#">Unity разработка</a>
                        <a href="#">Дошкольное обучение</a>
                    </div>
                    <div class="courses">
                        <div class="course">
                            <div class="title-course">
                                <a href="#" class="name-couse">Веб дизайн в Figma с нуля до результата! Основы UX/UI Web
                                    Design</a>
                                <br>
                                <a href="#" class="name-autor-course">Евгений Козич</a>
                            </div>
                            <img src="../pictures/images/photo.jpg" alt="" class="course-img">
                        </div>
                        <div class="course">
                            <div class="title-course">
                                <a href="#" class="name-couse">Веб дизайн в Figma с нуля до результата! Основы UX/UI Web
                                    Design</a>
                                <br>
                                <a href="#" class="name-autor-course">Евгений Козич</a>
                            </div>
                            <img src="../pictures/images/photo.jpg" alt="" class="course-img">
                        </div>
                        <div class="course">
                            <div class="title-course">
                                <a href="#" class="name-couse">Веб дизайн в Figma с нуля до результата! Основы UX/UI Web
                                    Design</a>
                                <br>
                                <a href="#" class="name-autor-course">Евгений Козич</a>
                            </div>
                            <img src="../pictures/images/photo.jpg" alt="" class="course-img">
                        </div>
                        <div class="course">
                            <div class="title-course">
                                <a href="#" class="name-couse">Веб дизайн в Figma с нуля до результата! Основы UX/UI Web
                                    Design</a>
                                <br>
                                <a href="#" class="name-autor-course">Евгений Козич</a>
                            </div>
                            <img src="../pictures/images/photo.jpg" alt="" class="course-img">
                        </div>
                        <div class="course">
                            <div class="title-course">
                                <a href="#" class="name-couse">Веб дизайн в Figma с нуля до результата! Основы UX/UI Web
                                    Design</a>
                                <br>
                                <a href="#" class="name-autor-course">Евгений Козич</a>
                            </div>
                            <img src="../pictures/images/photo.jpg" alt="" class="course-img">
                        </div>
                        <div class="course">
                            <div class="title-course">
                                <a href="#" class="name-couse">Веб дизайн в Figma с нуля до результата! Основы UX/UI Web
                                    Design</a>
                                <br>
                                <a href="#" class="name-autor-course">Евгений Козич</a>
                            </div>
                            <img src="../pictures/images/photo.jpg" alt="" class="course-img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-courses-content">
                <div class="main-content-title-course">
                    <h1 class="main-content-title">Нам доверяют </h1>
                </div>
                <div class="partners">
                    <a href="#" class="partners-logo-container">
                        <img src="../pictures/images/Ameli.svg" alt="" class="partner-logo-img">
                    </a>
                    <a href="#" class="partners-logo">
                        <img src="../pictures/images/antarus.svg" alt="" class="partner-logo-img">
                    </a>
                    <a href="#" class="partners-logo">
                        <img src="../pictures/images/artestate.svg" alt="" class="partner-logo-img">
                    </a>
                    <a href="#" class="partners-logo">
                        <img src="../pictures/images/bayboll.svg" alt="" class="partner-logo-img">
                    </a>
                    <a href="#" class="partners-logo">
                        <img src="../pictures/images/bibi.png" alt="" class="partner-logo-img">
                    </a>
                    <a href="#" class="partners-logo-container">
                        <img src="../pictures/images/biograd.svg" alt="" class="partner-logo-img">
                    </a>
                    <a href="#" class="partners-logo">
                        <img src="../pictures/images/minebea_intec.svg" alt="" class="partner-logo-img">
                    </a>
                    <a href="#" class="partners-logo">
                        <img src="../pictures/images/mssaun.svg" alt="" class="partner-logo-img">
                    </a>
                    <a href="#" class="partners-logo">
                        <img src="../pictures/images/obedov.svg" alt="" class="partner-logo-img">
                    </a>
                    <a href="#" class="partners-logo">
                        <img src="../pictures/images/ozornit-belki.svg" alt="" class="partner-logo-img">
                    </a>
                </div>
            </div>
            <div class="about-courses-content">
                <div class="autor-block">
                    <div class="autor-block-content">
                        <div class="autor-block-title">
                            <a href="#" class="name-couse">Евгений Козич</a>
                            <br>
                            <div class="autor-block-result">
                                <div class="autor-block-result-content">
                                    <i class="bx bxs-notepad icon"></i><span class="autor-block-count-courses">5</span><span class="autor-block-result-content-text">Курсов</span>
                                </div>
                                <div class="autor-block-result-content">
                                    <i class="bx bxs-notepad icon"></i><span class="autor-block-count-sub">12K</span><span class="autor-block-result-content-text">Подписчиков</span>
                                </div>
                            </div>
                        </div>
                        <img src="../pictures/images/photo.jpg" alt="" class="autor-block-img">
                    </div>
                    <div class="autor-block-content">
                        <div class="autor-block-title">
                            <a href="#" class="name-couse">Евгений Козич</a>
                            <br>
                            <div class="autor-block-result">
                                <div class="autor-block-result-content">
                                    <i class="bx bxs-notepad icon"></i><span class="autor-block-count-courses">5</span><span class="autor-block-result-content-text">Курсов</span>
                                </div>
                                <div class="autor-block-result-content">
                                    <i class="bx bxs-notepad icon"></i><span class="autor-block-count-sub">12K</span><span class="autor-block-result-content-text">Подписчиков</span>
                                </div>
                            </div>
                        </div>
                        <img src="../pictures/images/photo.jpg" alt="" class="autor-block-img">
                    </div>
                    <div class="autor-block-content">
                        <div class="autor-block-title">
                            <a href="#" class="name-couse">Евгений Козич</a>
                            <br>
                            <div class="autor-block-result">
                                <div class="autor-block-result-content">
                                    <i class="bx bxs-notepad icon"></i><span class="autor-block-count-courses">5</span><span class="autor-block-result-content-text">Курсов</span>
                                </div>
                                <div class="autor-block-result-content">
                                    <i class="bx bxs-notepad icon"></i><span class="autor-block-count-sub">12K</span><span class="autor-block-result-content-text">Подписчиков</span>
                                </div>
                            </div>
                        </div>
                        <img src="../pictures/images/photo.jpg" alt="" class="autor-block-img">
                    </div>
                    <div class="autor-block-content">
                        <div class="autor-block-title">
                            <a href="#" class="name-couse">Евгений Козич</a>
                            <br>
                            <div class="autor-block-result">
                                <div class="autor-block-result-content">
                                    <i class="bx bxs-notepad icon"></i><span class="autor-block-count-courses">5</span><span class="autor-block-result-content-text">Курсов</span>
                                </div>
                                <div class="autor-block-result-content">
                                    <i class="bx bxs-notepad icon"></i><span class="autor-block-count-sub">12K</span><span class="autor-block-result-content-text">Подписчиков</span>
                                </div>
                            </div>
                        </div>
                        <img src="../pictures/images/photo.jpg" alt="" class="autor-block-img">
                    </div>
                    <div class="autor-block-content">
                        <div class="autor-block-title">
                            <a href="#" class="name-couse">Евгений Козич</a>
                            <br>
                            <div class="autor-block-result">
                                <div class="autor-block-result-content">
                                    <i class="bx bxs-notepad icon"></i><span class="autor-block-count-courses">5</span><span class="autor-block-result-content-text">Курсов</span>
                                </div>
                                <div class="autor-block-result-content">
                                    <i class="bx bxs-notepad icon"></i><span class="autor-block-count-sub">12K</span><span class="autor-block-result-content-text">Подписчиков</span>
                                </div>
                            </div>
                        </div>
                        <img src="../pictures/images/photo.jpg" alt="" class="autor-block-img">
                    </div>
                    <div class="autor-block-content">
                        <div class="autor-block-title">
                            <a href="#" class="name-couse">Евгений Козич</a>
                            <br>
                            <div class="autor-block-result">
                                <div class="autor-block-result-content">
                                    <i class="bx bxs-notepad icon"></i><span class="autor-block-count-courses">5</span><span class="autor-block-result-content-text">Курсов</span>
                                </div>
                                <div class="autor-block-result-content">
                                    <i class="bx bxs-notepad icon"></i><span class="autor-block-count-sub">12K</span><span class="autor-block-result-content-text">Подписчиков</span>
                                </div>
                            </div>
                        </div>
                        <img src="../pictures/images/photo.jpg" alt="" class="autor-block-img">
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
