<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link  href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu&display=swap"  rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    @vite('resources/css/header.css')
    @vite('resources/css/main-side-bar-menu.css')
    @vite('resources/css/profile-edit.css')
    @vite('resources/css/footer.css')

    <title>Редактирование профиля</title>
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
                        <span class="profession">Профиль</span>
                    </div>
                </div>
            </header>
            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="file:///C:/Users/user/Desktop/Course%20Master/pages/profile.html#">
                                <i class='bx bxs-user-circle icon'></i>
                                <span class="text nav-text">Профиль</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="file:///C:/Users/user/Desktop/Course%20Master/pages/profile-edit.html?#">
                                <i class='bx bxs-cog icon'></i>
                                <span class="text nav-text">Настройки</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-trending-up icon'></i>
                                <span class="text nav-text">Статистика</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-customize icon'></i>
                                <span class="text nav-text">Заяки на курсы</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bxs-briefcase icon'></i>
                                <span class="text nav-text">Задания</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bxs-bell icon'></i>
                                <span class="text nav-text">Уведомления</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-bell-plus icon'></i>
                                <span class="text nav-text">Подписки</span>
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
                <h1>Редактирование профиля</h1>
                <div>
                    <form action="#">
                        <div class="form-edit-item">
                            <label for="NameUser">Ваше имя*</label>
                            <input type="text" id="NameUser">
                        </div>
                        <div class="form-edit-item">
                            <label for="SurNameUser">Фамилия*</label>
                            <input type="text" id="SurNameUser">
                        </div>
                        <div class="form-edit-item">
                            <label for="biography">Краткая биография</label>
                            <textarea name="" id="biography" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-edit-item">
                            <label for="AboutUser" >О себе</label>
                            <textarea name="" id="AboutUser" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-edit-item">
                            <label for="NameUser">Фотография</label>
                            <input id="imageInput" type="file" accept="image/*" onchange="previewImage()" />
                            <img id="preview" src="#" alt="Фотография" class="img-profile">
                        </div>
                        <button type="submit">Сохранить</button>
                    </form>
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
    <script src="../js/components/img-dowland.js"></script>
    <script src="../js/components/drop-down-language.js"></script>
</body>

</html>
