<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/zero-down.css', 'resources/css/course-catalog.css','resources/css/side-bar-menu.css','resources/css/card-course-style.css','resources/js/burger-button.js','resources/js/drop-down-exite.js','resources/css/notification-block.css','resources/js/drop-notification-block.js'])
    <title>Course-catalog</title>
</head>

<body>
    <header class="header">
        <div class="header-container">
            <div class="main-title">
                <img src="{{ asset('storage/images/icon-header/header-menu-block.svg')}}" alt="" class="burger-button">
                <h1 class="title-page">Каталог курсов</h1>
                <div class="nav-links">
                    <a href="{{route('index')}}">Главная</a><span>/</span><a href="{{route('courses-catalog')}}">Каталог курсов</a>
                </div>
            </div>
            <div class="block-search">
                <input type="search" placeholder="Поиск" class="header-search">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none" class="notification-img">
                        <mask id="mask0_201_1111" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28"
                              height="28">
                            <rect width="28" height="28" fill="#1C1B1F" fill-opacity="0.7" />
                        </mask>
                        <g mask="url(#mask0_201_1111)">
                            <path
                                d="M6 21V19H8V12C8 10.6167 8.41667 9.38733 9.25 8.312C10.0833 7.23733 11.1667 6.53333 12.5 6.2V5.5C12.5 5.08333 12.646 4.72933 12.938 4.438C13.2293 4.146 13.5833 4 14 4C14.4167 4 14.7707 4.146 15.062 4.438C15.354 4.72933 15.5 5.08333 15.5 5.5V6.2C16.8333 6.53333 17.9167 7.23733 18.75 8.312C19.5833 9.38733 20 10.6167 20 12V19H22V21H6ZM14 24C13.45 24 12.9793 23.8043 12.588 23.413C12.196 23.021 12 22.55 12 22H16C16 22.55 15.8043 23.021 15.413 23.413C15.021 23.8043 14.55 24 14 24ZM10 19H18V12C18 10.9 17.6083 9.95833 16.825 9.175C16.0417 8.39167 15.1 8 14 8C12.9 8 11.9583 8.39167 11.175 9.175C10.3917 9.95833 10 10.9 10 12V19Z"
                                fill="#1C1B1F" fill-opacity="0.7" />
                        </g>
                    </svg>
                </a>
                <div class="notification-block">
                    <div class="notification-block-content">
                        <div class="notification-block-incoming">
                            <a href="{{route('notifications')}}">
                                <div class="notification-block-content-title">
                                    <div class="notification-block-content-title-author">
                                        <img src="{{asset('storage/images/images-notification/notification-img-autor.svg')}}" alt="">
                                    </div>
                                    <div class="notification-block-content-body-author">
                                        <h1>Fundamentals of Electronics</h1>
                                        <div class="notification-block-content-body-author-massage">
                                            <p>Сообщение:</p><span>Пошёл....</span>
                                        </div>
                                        <div class="notification-block-content-body-author-time">
                                            <span>Shams Tabrez</span>
                                            <span>3</span>
                                            <span>days ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification-block-content-body">
                                    <a href="#">
                                        <i class="bx bx-x"></i>
                                    </a>
                                </div>
                            </a>
                        </div>
                        <div class="notification-block-incoming">
                            <a href="{{route('notifications')}}">
                                <div class="notification-block-content-title">
                                    <div class="notification-block-content-title-author">
                                        <img src="{{asset('storage/images/images-notification/notification-img-autor.svg')}}" alt="">
                                    </div>
                                    <div class="notification-block-content-body-author">
                                        <h1>Fundamentals of Electronics</h1>
                                        <div class="notification-block-content-body-author-massage">
                                            <p>Сообщение:</p><span>Пошёл....</span>
                                        </div>
                                        <div class="notification-block-content-body-author-time">
                                            <span>Shams Tabrez</span>
                                            <span>3</span>
                                            <span>days ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification-block-content-body">
                                    <a href="#">
                                        <i class="bx bx-x"></i>
                                    </a>
                                </div>
                            </a>
                        </div>
                        <div class="notification-block-incoming">
                            <a href="{{route('notifications')}}">
                                <div class="notification-block-content-title">
                                    <div class="notification-block-content-title-author">
                                        <img src="{{asset('storage/images/images-notification/notification-img-autor.svg')}}" alt="">
                                    </div>
                                    <div class="notification-block-content-body-author">
                                        <h1>Fundamentals of Electronics</h1>
                                        <div class="notification-block-content-body-author-massage">
                                            <p>Сообщение:</p><span>Пошёл....</span>
                                        </div>
                                        <div class="notification-block-content-body-author-time">
                                            <span>Shams Tabrez</span>
                                            <span>3</span>
                                            <span>days ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification-block-content-body">
                                    <a href="#" class="button-delete">
                                        <i class="bx bx-x"></i>
                                    </a>
                                </div>
                            </a>
                        </div>
                        <div class="link-notifications-block">
                            <a href="{{route('notifications')}}" class="link-notifications">Все уведомления</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="nav-menu">
        <div class="nav-menu-container">
            <div class="nav-menu-header">
                <a href="{{route('index')}}">
                    <img src="{{ asset('storage/images/logo.svg')}}" alt="">
                </a>
                <a href="{{route('my-courses-progress')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <mask id="mask0_201_1081" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28"
                              height="28">
                            <rect width="28" height="28" fill="#1C1B1F" />
                        </mask>
                        <g mask="url(#mask0_201_1081)">
                            <path
                                d="M15.1667 10.5V3.5H24.5V10.5H15.1667ZM3.5 15.1667V3.5H12.8333V15.1667H3.5ZM15.1667 24.5V12.8333H24.5V24.5H15.1667ZM3.5 24.5V17.5H12.8333V24.5H3.5ZM5.83333 12.8333H10.5V5.83333H5.83333V12.8333ZM17.5 22.1667H22.1667V15.1667H17.5V22.1667ZM17.5 8.16667H22.1667V5.83333H17.5V8.16667ZM5.83333 22.1667H10.5V19.8333H5.83333V22.1667Z"
                                fill="white" />
                        </g>
                    </svg>
                </a>
            </div>
            <div class="nav-buttons">
                <a href="{{route('courses-catalog')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <mask id="mask0_201_1086" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                              width="28" height="28">
                            <rect width="28" height="28" fill="#1C1B1F" />
                        </mask>
                        <g mask="url(#mask0_201_1086)">
                            <path
                                d="M14 23L7 19.2V13.2L3 11L14 5L25 11V19H23V12.1L21 13.2V19.2L14 23ZM14 14.7L20.85 11L14 7.3L7.15 11L14 14.7ZM14 20.725L19 18.025V14.25L14 17L9 14.25V18.025L14 20.725Z"
                                fill="white" />
                        </g>
                    </svg>
                </a>
                <a href="{{route('courses')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <mask id="mask0_201_1090" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                              width="28" height="28">
                            <rect width="28" height="28" fill="#1C1B1F" />
                        </mask>
                        <g mask="url(#mask0_201_1090)">
                            <path
                                d="M14.25 24C13.8167 24 13.425 23.896 13.075 23.688C12.725 23.4793 12.45 23.2 12.25 22.85C11.7 22.85 11.2293 22.6543 10.838 22.263C10.446 21.871 10.25 21.4 10.25 20.85V17.3C9.26667 16.65 8.47933 15.7917 7.888 14.725C7.296 13.6583 7 12.5 7 11.25C7 9.23333 7.704 7.52067 9.112 6.112C10.5207 4.704 12.2333 4 14.25 4C16.2667 4 17.979 4.704 19.387 6.112C20.7957 7.52067 21.5 9.23333 21.5 11.25C21.5 12.5333 21.2043 13.7 20.613 14.75C20.021 15.8 19.2333 16.65 18.25 17.3V20.85C18.25 21.4 18.0543 21.871 17.663 22.263C17.271 22.6543 16.8 22.85 16.25 22.85C16.05 23.2 15.775 23.4793 15.425 23.688C15.075 23.896 14.6833 24 14.25 24ZM12.25 20.85H16.25V19.95H12.25V20.85ZM12.25 18.95H16.25V18H12.25V18.95ZM12.05 16H13.5V13.3L11.3 11.1L12.35 10.05L14.25 11.95L16.15 10.05L17.2 11.1L15 13.3V16H16.45C17.35 15.5667 18.0833 14.929 18.65 14.087C19.2167 13.2457 19.5 12.3 19.5 11.25C19.5 9.78333 18.9917 8.54167 17.975 7.525C16.9583 6.50833 15.7167 6 14.25 6C12.7833 6 11.5417 6.50833 10.525 7.525C9.50833 8.54167 9 9.78333 9 11.25C9 12.3 9.28333 13.2457 9.85 14.087C10.4167 14.929 11.15 15.5667 12.05 16Z"
                                fill="white" />
                        </g>
                    </svg>
                </a>

                <a href="{{route('notifications')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <mask id="mask0_201_1095" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28"
                              height="28">
                            <rect width="28" height="28" fill="#1C1B1F" />
                        </mask>
                        <g mask="url(#mask0_201_1095)">
                            <path
                                d="M8 16H16V14H8V16ZM8 13H20V11H8V13ZM8 10H20V8H8V10ZM4 24V6C4 5.45 4.196 4.979 4.588 4.587C4.97933 4.19567 5.45 4 6 4H22C22.55 4 23.021 4.19567 23.413 4.587C23.8043 4.979 24 5.45 24 6V18C24 18.55 23.8043 19.021 23.413 19.413C23.021 19.8043 22.55 20 22 20H8L4 24ZM6 19.175L7.175 18H22V6H6V19.175Z"
                                fill="white" />
                        </g>
                    </svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <mask id="mask0_201_1099" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28"
                              height="28">
                            <rect width="28" height="28" fill="#1C1B1F" />
                        </mask>
                        <g mask="url(#mask0_201_1099)">
                            <path
                                d="M14 17C13.45 17 12.9793 16.804 12.588 16.412C12.196 16.0207 12 15.55 12 15C12 14.45 12.196 13.979 12.588 13.587C12.9793 13.1957 13.45 13 14 13C14.55 13 15.021 13.1957 15.413 13.587C15.8043 13.979 16 14.45 16 15C16 15.55 15.8043 16.0207 15.413 16.412C15.021 16.804 14.55 17 14 17ZM9.925 19.425C9.34167 18.875 8.875 18.221 8.525 17.463C8.175 16.7043 8 15.8833 8 15C8 13.3333 8.58333 11.9167 9.75 10.75C10.9167 9.58333 12.3333 9 14 9C15.6667 9 17.0833 9.58333 18.25 10.75C19.4167 11.9167 20 13.3333 20 15C20 15.8833 19.825 16.7083 19.475 17.475C19.125 18.2417 18.6583 18.8917 18.075 19.425L16.65 18C17.0667 17.6167 17.3957 17.1667 17.637 16.65C17.879 16.1333 18 15.5833 18 15C18 13.9 17.6083 12.9583 16.825 12.175C16.0417 11.3917 15.1 11 14 11C12.9 11 11.9583 11.3917 11.175 12.175C10.3917 12.9583 10 13.9 10 15C10 15.6 10.121 16.154 10.363 16.662C10.6043 17.1707 10.9333 17.6167 11.35 18L9.925 19.425ZM7.1 22.25C6.15 21.3333 5.396 20.254 4.838 19.012C4.27933 17.7707 4 16.4333 4 15C4 13.6167 4.26267 12.3167 4.788 11.1C5.31267 9.88333 6.025 8.825 6.925 7.925C7.825 7.025 8.88333 6.31233 10.1 5.787C11.3167 5.26233 12.6167 5 14 5C15.3833 5 16.6833 5.26233 17.9 5.787C19.1167 6.31233 20.175 7.025 21.075 7.925C21.975 8.825 22.6873 9.88333 23.212 11.1C23.7373 12.3167 24 13.6167 24 15C24 16.4333 23.721 17.775 23.163 19.025C22.6043 20.275 21.85 21.35 20.9 22.25L19.5 20.85C20.2667 20.1167 20.875 19.246 21.325 18.238C21.775 17.2293 22 16.15 22 15C22 12.7667 21.225 10.875 19.675 9.325C18.125 7.775 16.2333 7 14 7C11.7667 7 9.875 7.775 8.325 9.325C6.775 10.875 6 12.7667 6 15C6 16.15 6.225 17.225 6.675 18.225C7.125 19.225 7.74167 20.0917 8.525 20.825L7.1 22.25Z"
                                fill="white" />
                            <path
                                d="M12.588 16.412C12.9793 16.804 13.45 17 14 17C14.55 17 15.021 16.804 15.413 16.412C15.8043 16.0207 16 15.55 16 15C16 14.45 15.8043 13.979 15.413 13.587C15.021 13.1957 14.55 13 14 13C13.45 13 12.9793 13.1957 12.588 13.587C12.196 13.979 12 14.45 12 15C12 15.55 12.196 16.0207 12.588 16.412Z"
                                fill="#EB5757" />
                        </g>
                    </svg>
                </a>
            </div>
            <div class="nav-menu-exite">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none" class="img-exit">
                    <circle cx="20" cy="20" r="20" fill="#BB6BD9" />
                    <mask id="mask0_201_1075" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="8" y="8" width="24"
                          height="24">
                        <rect x="8" y="8" width="24" height="24" fill="#D9D9D9" />
                    </mask>
                    <g mask="url(#mask0_201_1075)">
                        <path
                            d="M16.1776 22.25C15.7621 22.25 15.4112 22.129 15.1248 21.887C14.8375 21.6457 14.6939 21.35 14.6939 21C14.6939 20.65 14.8375 20.3543 15.1248 20.113C15.4112 19.871 15.7621 19.75 16.1776 19.75C16.593 19.75 16.9439 19.871 17.2303 20.113C17.5176 20.3543 17.6612 20.65 17.6612 21C17.6612 21.35 17.5176 21.6457 17.2303 21.887C16.9439 22.129 16.593 22.25 16.1776 22.25ZM23.299 22.25C22.8836 22.25 22.5327 22.129 22.2463 21.887C21.959 21.6457 21.8154 21.35 21.8154 21C21.8154 20.65 21.959 20.3543 22.2463 20.113C22.5327 19.871 22.8836 19.75 23.299 19.75C23.7145 19.75 24.0654 19.871 24.3518 20.113C24.6391 20.3543 24.7827 20.65 24.7827 21C24.7827 21.35 24.6391 21.6457 24.3518 21.887C24.0654 22.129 23.7145 22.25 23.299 22.25ZM19.7383 28C22.3891 28 24.6343 27.225 26.474 25.675C28.3138 24.125 29.2336 22.2333 29.2336 20C29.2336 19.6 29.204 19.2123 29.1446 18.837C29.0853 18.4623 28.9765 18.1 28.8182 17.75C28.4028 17.8333 27.9874 17.896 27.5719 17.938C27.1565 17.9793 26.7213 18 26.2663 18C24.4662 18 22.7649 17.675 21.1626 17.025C19.5603 16.375 18.1953 15.4667 17.0677 14.3C16.4347 15.6 15.5299 16.7293 14.3533 17.688C13.1758 18.646 11.8057 19.3667 10.243 19.85V20C10.243 22.2333 11.1628 24.125 13.0026 25.675C14.8423 27.225 17.0875 28 19.7383 28ZM19.7383 30C18.0964 30 16.5534 29.7373 15.1093 29.212C13.6652 28.6873 12.4091 27.975 11.3409 27.075C10.2726 26.175 9.42717 25.1167 8.80443 23.9C8.1809 22.6833 7.86914 21.3833 7.86914 20C7.86914 18.6167 8.1809 17.3167 8.80443 16.1C9.42717 14.8833 10.2726 13.825 11.3409 12.925C12.4091 12.025 13.6652 11.3123 15.1093 10.787C16.5534 10.2623 18.0964 10 19.7383 10C21.3802 10 22.9232 10.2623 24.3673 10.787C25.8114 11.3123 27.0675 12.025 28.1357 12.925C29.204 13.825 30.0494 14.8833 30.6722 16.1C31.2957 17.3167 31.6075 18.6167 31.6075 20C31.6075 21.3833 31.2957 22.6833 30.6722 23.9C30.0494 25.1167 29.204 26.175 28.1357 27.075C27.0675 27.975 25.8114 28.6873 24.3673 29.212C22.9232 29.7373 21.3802 30 19.7383 30ZM18.136 12.125C18.9668 13.2917 20.0944 14.2293 21.5187 14.938C22.943 15.646 24.5255 16 26.2663 16C26.5433 16 26.8103 15.9877 27.0675 15.963C27.3247 15.9377 27.5917 15.9083 27.8687 15.875C27.0378 14.7083 25.9103 13.7707 24.486 13.062C23.0617 12.354 21.4791 12 19.7383 12C19.4614 12 19.1943 12.0123 18.9371 12.037C18.68 12.0623 18.4129 12.0917 18.136 12.125ZM10.7474 17.475C11.7563 16.9917 12.6366 16.3667 13.3883 15.6C14.14 14.8333 14.7038 13.975 15.0797 13.025C14.0708 13.5083 13.1905 14.1333 12.4388 14.9C11.6871 15.6667 11.1233 16.525 10.7474 17.475Z"
                            fill="#1C1B1F" />
                    </g>
                </svg>
                <div class="block-excite">
                    <div class="block-excite-content">
                        <a href="{{route('index')}}">Выход</a>
                        <a href="{{'my-courses-progress'}}">Профиль</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="main-content-container">
            <div>
                <input type="search" class="search-content" placeholder="Поиск...">
                <ul class="category-list">
                    <li class="category">
                        <a href="{{route('courses')}}" class="hover-link">
                            Мои курсы
                        </a>
                    </li>
                    <li class="category">
                        <a href="#" class="hover-link">
                            Машинное обучение
                        </a>
                        <div class="overlay">
                            <div class="overlay-content">
                                <a href="#">Робототехника</a>
                                <a href="#">Радиоэлектроника</a>
                                <a href="#">ИИ</a>
                                <a href="#">Привет мир</a>
                            </div>
                        </div>
                    </li>
                    <li class="category">
                        <a href="#" class="hover-link">
                            UX/UI
                        </a>
                        <div class="overlay">
                            <div class="overlay-content">
                                <a href="#">Photoshop</a>
                                <a href="#">Figma</a>
                                <a href="#">After Effects</a>
                                <a href="#">Web Desire</a>
                            </div>
                        </div>
                    </li>
                    <li class="category">
                        <a href="#" class="hover-link">
                            Английский
                        </a>
                        <div class="overlay">
                            <div class="overlay-content">
                                <a href="#">Робототехника</a>
                                <a href="#">Радиоэлектроника</a>
                                <a href="#">ИИ</a>
                                <a href="#">Привет мир</a>
                            </div>
                        </div>
                    </li>
                    <li class="category">
                        <a href="#" class="hover-link">
                            Биология
                        </a>
                        <div class="overlay">
                            <div class="overlay-content">
                                <a href="#">Робототехника</a>
                                <a href="#">Радиоэлектроника</a>
                                <a href="#">ИИ</a>
                                <a href="#">Привет мир</a>
                            </div>
                        </div>
                    </li>
{{--                    <li class="category">--}}
{{--                        <a href="#" class="hover-link">--}}
{{--                            Новое--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </div>
            <div class="courses-container">
                <div class="card-course-step">
                    <input type="checkbox" id="0" class="button-favourites">
                    <label for="0" class="label-favourites">&#9829</label>
                    <div class="card-course-step-title">
                        <div>
                            <img src="{{ asset('storage/images/school.svg')}}" alt="">
                        </div>
                        <div class="card-course-step-title-lessons">
                            <span>5</span><span>lessons</span><span>&#183;</span><span>4</span><span>quizes</span>
                        </div>
                    </div>
                    <a href="{{route('course-index')}}" class="card-course-slogans">
                        <div class="card-course-slogan">
                            Fundamental to IoT
                        </div>
                        <div class="card-course-step-slogan-step">
                            Overview of available development boards
                        </div>
                    </a>
                    <div id="show-nav" class="dropbtncat">
                        <div id="dropdown-card" onClick="DropCard(this)">Категории<span class="arrow">&#9668;</span></div>
                        <div  class="dropdown-content-card">
                            <div class="content-card">
                                <a href="#option1">English</a>
                                <a href="#option2">Machine learning</a>
                                <a href="#option3">Biology</a>
                                <a href="#option3">UX/UI</a>
                                <a href="#option3">Math</a>

                            </div>
                        </div>
                    </div>
                    <div class="card-course-step-autor-block">
                        <img src="{{ asset('storage/images/copyright.svg')}}" alt="">
                        <a href="#" class="bottom-content-autor-link">Shams Tabrez</a>
                    </div>
                    <img src="{{ asset('storage/images/sitting-1.svg')}}" alt="" class="card-course-step-img">
                </div>

                <div class="card-course-step">
                    <input type="checkbox" id="1" class="button-favourites">
                    <label for="1" class="label-favourites">&#9829</label>
                    <div class="card-course-step-title">
                        <div>
                            <img src="{{ asset('storage/images/school.svg')}}" alt="">
                        </div>
                        <div class="card-course-step-title-lessons">
                            <span>5</span><span>lessons</span><span>&#183;</span><span>4</span><span>quizes</span>
                        </div>
                    </div>
                    <a href="{{route('course-index')}}" class="card-course-slogans">
                        <div class="card-course-slogan">
                            Fundamental to IoT
                        </div>
                        <div class="card-course-step-slogan-step">
                            Overview of available development boards
                        </div>
                    </a>
                    <div id="show-nav" class="dropbtncat">
                        <div id="dropdown-card" onClick="DropCard(this)">Категории<span class="arrow">&#9668;</span></div>
                        <div  class="dropdown-content-card">
                            <div class="content-card">
                                <a href="#option1">English</a>
                                <a href="#option2">Machine learning</a>
                                <a href="#option3">Biology</a>
                                <a href="#option3">UX/UI</a>
                                <a href="#option3">Math</a>

                            </div>
                        </div>
                    </div>
                    <div class="card-course-step-autor-block">
                        <img src="{{ asset('storage/images/copyright.svg')}}" alt="">
                        <a href="#" class="bottom-content-autor-link">Shams Tabrez</a>
                    </div>
                    <img src="{{ asset('storage/images/sitting-2.svg')}}" alt="" class="card-course-step-img">
                </div>

                <div class="card-course-step">
                    <input type="checkbox" id="2" class="button-favourites">
                    <label for="2" class="label-favourites">&#9829</label>
                    <div class="card-course-step-title">
                        <div>
                            <img src="{{ asset('storage/images/school.svg')}}" alt="">
                        </div>
                        <div class="card-course-step-title-lessons">
                            <span>5</span><span>lessons</span><span>&#183;</span><span>4</span><span>quizes</span>
                        </div>
                    </div>
                    <a href="{{route('course-index')}}" class="card-course-slogans">
                        <div class="card-course-slogan">
                            Fundamental to IoT
                        </div>
                        <div class="card-course-step-slogan-step">
                            Overview of available development boards
                        </div>
                    </a>
                    <div id="show-nav" class="dropbtncat">
                        <div id="dropdown-card" onClick="DropCard(this)">Категории<span class="arrow">&#9668;</span></div>
                        <div  class="dropdown-content-card">
                            <div class="content-card">
                                <a href="#option1">English</a>
                                <a href="#option2">Machine learning</a>
                                <a href="#option3">Biology</a>
                                <a href="#option3">UX/UI</a>
                                <a href="#option3">Math</a>

                            </div>
                        </div>
                    </div>
                    <div class="card-course-step-autor-block">
                        <img src="{{ asset('storage/images/copyright.svg')}}" alt="">
                        <a href="#" class="bottom-content-autor-link">Shams Tabrez</a>
                    </div>
                    <img src="{{ asset('storage/images/sitting-1.svg')}}" alt="" class="card-course-step-img">
                </div>

                <div class="card-course-step">
                    <input type="checkbox" id="3" class="button-favourites">
                    <label for="3" class="label-favourites">&#9829</label>
                    <div class="card-course-step-title">
                        <div>
                            <img src="{{ asset('storage/images/school.svg')}}" alt="">
                        </div>
                        <div class="card-course-step-title-lessons">
                            <span>5</span><span>lessons</span><span>&#183;</span><span>4</span><span>quizes</span>
                        </div>
                    </div>
                    <a href="{{route('course-index')}}" class="card-course-slogans">
                        <div class="card-course-slogan">
                            Fundamental to IoT
                        </div>
                        <div class="card-course-step-slogan-step">
                            Overview of available development boards
                        </div>
                    </a>
                    <div id="show-nav" class="dropbtncat">
                        <div id="dropdown-card" onClick="DropCard(this)">Категории<span class="arrow">&#9668;</span></div>
                        <div  class="dropdown-content-card">
                            <div class="content-card">
                                <a href="#option1">English</a>
                                <a href="#option2">Machine learning</a>
                                <a href="#option3">Biology</a>
                                <a href="#option3">UX/UI</a>
                                <a href="#option3">Math</a>

                            </div>
                        </div>
                    </div>
                    <div class="card-course-step-autor-block">
                        <img src="{{ asset('storage/images/copyright.svg')}}" alt="">
                        <a href="#" class="bottom-content-autor-link">Shams Tabrez</a>
                    </div>
                    <img src="{{ asset('storage/images/sitting-2.svg')}}" alt="" class="card-course-step-img">
                </div>

                <div class="card-course-step">
                    <input type="checkbox" id="4" class="button-favourites">
                    <label for="4" class="label-favourites">&#9829</label>
                    <div class="card-course-step-title">
                        <div>
                            <img src="{{ asset('storage/images/school.svg')}}" alt="">
                        </div>
                        <div class="card-course-step-title-lessons">
                            <span>5</span><span>lessons</span><span>&#183;</span><span>4</span><span>quizes</span>
                        </div>
                    </div>
                    <a href="{{route('course-index')}}" class="card-course-slogans">
                        <div class="card-course-slogan">
                            Fundamental to IoT
                        </div>
                        <div class="card-course-step-slogan-step">
                            Overview of available development boards
                        </div>
                    </a>
                    <div id="show-nav" class="dropbtncat">
                        <div id="dropdown-card" onClick="DropCard(this)">Категории<span class="arrow">&#9668;</span></div>
                        <div  class="dropdown-content-card">
                            <div class="content-card">
                                <a href="#option1">English</a>
                                <a href="#option2">Machine learning</a>
                                <a href="#option3">Biology</a>
                                <a href="#option3">UX/UI</a>
                                <a href="#option3">Math</a>

                            </div>
                        </div>
                    </div>
                    <div class="card-course-step-autor-block">
                        <img src="{{ asset('storage/images/copyright.svg')}}" alt="">
                        <a href="#" class="bottom-content-autor-link">Shams Tabrez</a>
                    </div>
                    <img src="{{ asset('storage/images/sitting-1.svg')}}" alt="" class="card-course-step-img">
                </div>

                <div class="card-course-step">
                    <input type="checkbox" id="5" class="button-favourites">
                    <label for="5" class="label-favourites">&#9829</label>
                    <div class="card-course-step-title">
                        <div>
                            <img src="{{ asset('storage/images/school.svg')}}" alt="">
                        </div>
                        <div class="card-course-step-title-lessons">
                            <span>5</span><span>lessons</span><span>&#183;</span><span>4</span><span>quizes</span>
                        </div>
                    </div>
                    <a href="{{route('course-index')}}" class="card-course-slogans">
                        <div class="card-course-slogan">
                            Fundamental to IoT
                        </div>
                        <div class="card-course-step-slogan-step">
                            Overview of available development boards
                        </div>
                    </a>
                    <div id="show-nav" class="dropbtncat">
                        <div id="dropdown-card" onClick="DropCard(this)">Категории<span class="arrow">&#9668;</span></div>
                        <div  class="dropdown-content-card">
                            <div class="content-card">
                                <a href="#option1">English</a>
                                <a href="#option2">Machine learning</a>
                                <a href="#option3">Biology</a>
                                <a href="#option3">UX/UI</a>
                                <a href="#option3">Math</a>

                            </div>
                        </div>
                    </div>
                    <div class="card-course-step-autor-block">
                        <img src="{{ asset('storage/images/copyright.svg')}}" alt="">
                        <a href="#" class="bottom-content-autor-link">Shams Tabrez</a>
                    </div>
                    <img src="{{ asset('storage/images/sitting-2.svg')}}" alt="" class="card-course-step-img">
                </div>

                <div class="card-course-step">
                    <input type="checkbox" id="6" class="button-favourites">
                    <label for="6" class="label-favourites">&#9829</label>
                    <div class="card-course-step-title">
                        <div>
                            <img src="{{ asset('storage/images/school.svg')}}" alt="">
                        </div>
                        <div class="card-course-step-title-lessons">
                            <span>5</span><span>lessons</span><span>&#183;</span><span>4</span><span>quizes</span>
                        </div>
                    </div>
                    <a href="{{route('course-index')}}" class="card-course-slogans">
                        <div class="card-course-slogan">
                            Fundamental to IoT
                        </div>
                        <div class="card-course-step-slogan-step">
                            Overview of available development boards
                        </div>
                    </a>
                    <div id="show-nav" class="dropbtncat">
                        <div id="dropdown-card" onClick="DropCard(this)">Категории<span class="arrow">&#9668;</span></div>
                        <div  class="dropdown-content-card">
                            <div class="content-card">
                                <a href="#option1">English</a>
                                <a href="#option2">Machine learning</a>
                                <a href="#option3">Biology</a>
                                <a href="#option3">UX/UI</a>
                                <a href="#option3">Math</a>

                            </div>
                        </div>
                    </div>
                    <div class="card-course-step-autor-block">
                        <img src="{{ asset('storage/images/copyright.svg')}}" alt="">
                        <a href="#" class="bottom-content-autor-link">Shams Tabrez</a>
                    </div>
                    <img src="{{ asset('storage/images/sitting-1.svg')}}" alt="" class="card-course-step-img">
                </div>

                <div class="card-course-step">
                    <input type="checkbox" id="7" class="button-favourites">
                    <label for="7" class="label-favourites">&#9829</label>
                    <div class="card-course-step-title">
                        <div>
                            <img src="{{ asset('storage/images/school.svg')}}" alt="">
                        </div>
                        <div class="card-course-step-title-lessons">
                            <span>5</span><span>lessons</span><span>&#183;</span><span>4</span><span>quizes</span>
                        </div>
                    </div>
                    <a href="{{route('course-index')}}" class="card-course-slogans">
                        <div class="card-course-slogan">
                            Fundamental to IoT
                        </div>
                        <div class="card-course-step-slogan-step">
                            Overview of available development boards
                        </div>
                    </a>
                    <div id="show-nav" class="dropbtncat">
                        <div id="dropdown-card" onClick="DropCard(this)">Категории<span class="arrow">&#9668;</span></div>
                        <div  class="dropdown-content-card">
                            <div class="content-card">
                                <a href="#option1">English</a>
                                <a href="#option2">Machine learning</a>
                                <a href="#option3">Biology</a>
                                <a href="#option3">UX/UI</a>
                                <a href="#option3">Math</a>

                            </div>
                        </div>
                    </div>
                    <div class="card-course-step-autor-block">
                        <img src="{{ asset('storage/images/copyright.svg')}}" alt="">
                        <a href="#" class="bottom-content-autor-link">Shams Tabrez</a>
                    </div>
                    <img src="{{ asset('storage/images/sitting-2.svg')}}" alt="" class="card-course-step-img">
                </div>


            </div>
        </div>
    </div>
    <script>
        @verbatim
        function DropCard(a) {
            a.parentNode.getElementsByClassName('dropdown-content-card')[0].classList.toggle("show");
            a.parentNode.getElementsByClassName('arrow')[0].classList.toggle("active");
        }
        @endverbatim
    </script>
</body>

</html>
