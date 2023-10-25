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
    @vite('resources/css/course-constuctor.css')
    @vite('resources/css/footer.css')

    <title>Создание страницы курса</title>
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
                        <span class="profession">Мои курсы</span>
                    </div>
                </div>

            </header>
            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="file:///C:/Users/user/Desktop/Course%20Master/pages/page-all-courses.html#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">Курсы</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="file:///C:/Users/user/Desktop/Course%20Master/pages/lesson-constuctor.html#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">Уроки</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-book-open icon'></i>
                                <span class="text nav-text">Уведомления</span>
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
        <section class="create-course">
          <div class="create-course-content">
               <form action="" class="course-form">
                <h1>Создание страницы курса</h1>
                 <div class="create-content-form">
                    <label for="create_input">Название курса*</label>
                    <input type="text" id="create_input" class="create-input">
                 </div>
                 <div class="create-content-form">
                    <label for="create_input">О курсе*</label>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                 </div>
                 <div class="create-content-form">
                    <label for="create_input">Для кого предназначен*</label>
                    <input type="text" id="create_input" class="create-input">
                 </div>
                 <div class="create-content-form">
                    <label for="create_input">Что нужно знать для начала</label>
                    <input type="text" id="create_input" class="create-input">
                 </div>
                 <div class="create-content-form">
                    <label for="create_input">Программа курса</label>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                 </div>
                 <button type="submit">Создать</button>
               </form>
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
