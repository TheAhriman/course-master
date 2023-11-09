<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/zero-down.css','resources/css/header.css','resources/css/footer.css','resources/css/index.css', 'resources/css/card-course-style.css'])
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Главная</title>
</head>
<body>
<header class="header">
    <div class="header_container">
        <div class="header_nav_menu">
            <a href="#" class="link_logo">WOLP</a>
            <a href="{{route('courses-catalog')}}" class="header_link">Каталог</a>
            <a href="{{route('courses')}}" class="header_link">Мои курсы</a>
        </div>
        <div class="header_nav_buttons">
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Язык</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="#">Русский</a>
                    <a href="#">Английский</a>
                </div>
            </div>
            <div class="exite_links">
                <a href="{{route('my-courses-progress')}}" class="exite_link">Войти</a>
                <a href="#" class="exite_link">Регистрация</a>
            </div>
        </div>
    </div>
</header>

<div class="main-content">
    <div class="main-content-container">
       <div class="main-content-new">
           <h1 class="main-content-title">Новинки для вас!</h1>
           <div class="list-category">
               <a href="#">Машинное обучение</a>
               <a href="#">UX/UI</a>
               <a href="#">Английский</a>
               <a href="#">Биология</a>
           </div>
           <div class="main-content-new-block-content">
               <div class="card-course">
                   <div class="top-content">
                       <div class="top-content-title">
                           <a href="#" class="top-content-link">Machine Learning</a>
                       </div>
                       <div class="top-content-text">
                           <a href="#" class="top-content-text-link">Basic data-structure and algorithm</a>
                       </div>
                       <div class="top-content-logo">
                           <img src="{{ asset('storage/images/logo-card.svg')}}" alt="" class="logo-card">
                       </div>
                       <div class="top-content-img">
                           <img src="{{ asset('storage/images/sitting-1.svg')}}" alt="">
                       </div>
                   </div>
                   <div class="bottom-content">
                       <div class="bottom-content-title">
                           <a href="#" class="bottom-content-title-link">Machine Learning and Data analysis</a>
                       </div>
                       <div class="bottom-content-date">
                           <div class="bottom-content-autor_block">
                               <img src="{{ asset('storage/images/copyright.svg')}}" alt="">
                               <a href="#" class="bottom-content-autor-link">Shams Tabrez</a>
                           </div>
                           <div class="bottom-content-date-lesson">
                               <span>12</span><span>lessons</span><span>&#183;</span><span>7</span><span>quiz</span>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="card-course">
                   <div class="top-content">
                       <div class="top-content-title">
                           <a href="#" class="top-content-link">Machine Learning</a>
                       </div>
                       <div class="top-content-text">
                           <a href="#" class="top-content-text-link">Basic data-structure and algorithm</a>
                       </div>
                       <div class="top-content-logo">
                           <img src="{{ asset('storage/images/logo-card.svg')}}" alt="" class="logo-card">
                       </div>
                       <div class="top-content-img">
                           <img src="{{ asset('storage/images/sitting-2.svg')}}" alt="">
                       </div>
                   </div>
                   <div class="bottom-content">
                       <div class="bottom-content-title">
                           <a href="#" class="bottom-content-title-link">Machine Learning and Data analysis</a>
                       </div>
                       <div class="bottom-content-date">
                           <div class="bottom-content-autor_block">
                               <img src="{{ asset('storage/images/copyright.svg')}}" alt="">
                               <a href="#" class="bottom-content-autor-link">Shams Tabrez</a>
                           </div>
                           <div class="bottom-content-date-lesson">
                               <span>12</span><span>lessons</span><span>&#183;</span><span>7</span><span>quiz</span>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="card-course">
                   <div class="top-content">
                       <div class="top-content-title">
                           <a href="#" class="top-content-link">Machine Learning</a>
                       </div>
                       <div class="top-content-text">
                           <a href="#" class="top-content-text-link">Basic data-structure and algorithm</a>
                       </div>
                       <div class="top-content-logo">
                           <img src="{{ asset('storage/images/logo-card.svg')}}" alt="" class="logo-card">
                       </div>
                       <div class="top-content-img">
                           <img src="{{ asset('storage/images/sitting-1.svg')}}" alt="">
                       </div>
                   </div>
                   <div class="bottom-content">
                       <div class="bottom-content-title">
                           <a href="#" class="bottom-content-title-link">Machine Learning and Data analysis</a>
                       </div>
                       <div class="bottom-content-date">
                           <div class="bottom-content-autor_block">
                               <img src="{{ asset('storage/images/copyright.svg')}}" alt="">
                               <a href="#" class="bottom-content-autor-link">Shams Tabrez</a>
                           </div>
                           <div class="bottom-content-date-lesson">
                               <span>12</span><span>lessons</span><span>&#183;</span><span>7</span><span>quiz</span>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="card-course">
                   <div class="top-content">
                       <div class="top-content-title">
                           <a href="#" class="top-content-link">Machine Learning</a>
                       </div>
                       <div class="top-content-text">
                           <a href="#" class="top-content-text-link">Basic data-structure and algorithm</a>
                       </div>
                       <div class="top-content-logo">
                           <img src="{{ asset('storage/images/logo-card.svg')}}" alt="" class="logo-card">
                       </div>
                       <div class="top-content-img">
                           <img src="{{ asset('storage/images/sitting-2.svg')}}" alt="">
                       </div>
                   </div>
                   <div class="bottom-content">
                       <div class="bottom-content-title">
                           <a href="#" class="bottom-content-title-link">Machine Learning and Data analysis</a>
                       </div>
                       <div class="bottom-content-date">
                           <div class="bottom-content-autor_block">
                               <img src="{{ asset('storage/images/copyright.svg')}}" alt="">
                               <a href="#" class="bottom-content-autor-link">Shams Tabrez</a>
                           </div>
                           <div class="bottom-content-date-lesson">
                               <span>12</span><span>lessons</span><span>&#183;</span><span>7</span><span>quiz</span>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="card-course">
                   <div class="top-content">
                       <div class="top-content-title">
                           <a href="#" class="top-content-link">Machine Learning</a>
                       </div>
                       <div class="top-content-text">
                           <a href="#" class="top-content-text-link">Basic data-structure and algorithm</a>
                       </div>
                       <div class="top-content-logo">
                           <img src="{{ asset('storage/images/logo-card.svg')}}" alt="" class="logo-card">
                       </div>
                       <div class="top-content-img">
                           <img src="{{ asset('storage/images/sitting-1.svg')}}" alt="">
                       </div>
                   </div>
                   <div class="bottom-content">
                       <div class="bottom-content-title">
                           <a href="#" class="bottom-content-title-link">Machine Learning and Data analysis</a>
                       </div>
                       <div class="bottom-content-date">
                           <div class="bottom-content-autor_block">
                               <img src="{{ asset('storage/images/copyright.svg')}}" alt="">
                               <a href="#" class="bottom-content-autor-link">Shams Tabrez</a>
                           </div>
                           <div class="bottom-content-date-lesson">
                               <span>12</span><span>lessons</span><span>&#183;</span><span>7</span><span>quiz</span>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="card-course">
                   <div class="top-content">
                       <div class="top-content-title">
                           <a href="#" class="top-content-link">Machine Learning</a>
                       </div>
                       <div class="top-content-text">
                           <a href="#" class="top-content-text-link">Basic data-structure and algorithm</a>
                       </div>
                       <div class="top-content-logo">
                           <img src="{{ asset('storage/images/logo-card.svg')}}" alt="" class="logo-card">
                       </div>
                       <div class="top-content-img">
                           <img src="{{ asset('storage/images/sitting-2.svg')}}" alt="">
                       </div>
                   </div>
                   <div class="bottom-content">
                       <div class="bottom-content-title">
                           <a href="#" class="bottom-content-title-link">Machine Learning and Data analysis</a>
                       </div>
                       <div class="bottom-content-date">
                           <div class="bottom-content-autor_block">
                               <img src="{{ asset('storage/images/copyright.svg')}}" alt="">
                               <a href="#" class="bottom-content-autor-link">Shams Tabrez</a>
                           </div>
                           <div class="bottom-content-date-lesson">
                               <span>12</span><span>lessons</span><span>&#183;</span><span>7</span><span>quiz</span>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
        <div class="partners-block">
            <h1 class="main-content-title">Наши партнёры:</h1>
            <div class="partners-block-content">
                <img src="{{ asset('storage/images/images-index/1C.png')}}" alt="" class="partner-logo">
                <img src="{{ asset('storage/images/images-index/Akira.png')}}"  alt="" class="partner-logo">
                <img src="{{ asset('storage/images/images-index/Ameli.svg')}}"  alt="" class="partner-logo">
                <img src="{{ asset('storage/images/images-index/antarus.svg')}}"  alt="" class="partner-logo">
                <img src="{{ asset('storage/images/images-index/artestate.svg')}}" alt="" class="partner-logo">
                <img src="{{ asset('storage/images/images-index/bayboll.svg')}}" alt="" class="partner-logo">
                <img src="{{ asset('storage/images/images-index/bibi.png')}}" alt="" class="partner-logo">
                <img src="{{ asset('storage/images/images-index/biograd.svg')}}" alt="" class="partner-logo">
            </div>
        </div>
        <div class="block-category">
            <h1 class="main-content-title">Популярные курсы:</h1>
            <div class="block-category-content">
                <a href="#" class="">
                    <div class="category-fist">
                        <p>Английский</p>
                        <p><span>12</span> курсов</p>
                    </div>
                </a>
                <a href="#" class="">
                    <div class="category-step">
                        <p>Машинное обучение</p>
                        <p><span>5</span> курсов</p>
                    </div>
                </a>
                <a href="#" class="">
                    <div class="category-fist">
                        <p>Биология</p>
                        <p><span>2</span> курсов</p>
                    </div>
                </a>
                <a href="#" class="">
                    <div class="category-fist">
                        <p>Биология</p>
                        <p><span>2</span> курсов</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="footer_container">
      <div class="footer-container-links">
          <h1 class="footer-logo">WOLP</h1>
            <div class="footer-links">
                <a href="#">Политика обработки персональных данных </a>
                <a href="#">Политика конфиденциальности</a>
                <a href="#">Пользовательское соглашение</a>
                <a href="#">Публичная оферта</a>
                <a href="#">Обратная связь</a>
                <a href="#">О нас</a>
            </div>
      </div>
        <div class="footer-container-info">
            <h1 class="footer-container-info-title">Информация:</h1>
            <div class="footer-container-info-content">
                <p>Адресс: <span>Новооктябрьская 14</span></p>
                <p>Телефон: <span>+375(29)-999-99-99</span></p>
                <p>Email: <span>wolp@gmail.com</span></p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
