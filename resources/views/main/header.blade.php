<header class="header">
    <div class="container">

        <a class="header__brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <nav class="main-menu">
            <ul class="main-menu__list">
                <li class="main-menu__item {{ is_active('news.*') }}">
                    <a href="{{ route('news.index') }}" class="main-menu__link">Новости</a>
                    <ul class="main-menu-dropdown">
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                    </ul>
                </li>
                <li class="main-menu__item {{ is_active('stories.*') }}">
                    <a href="{{ route('stories.index') }}" class="main-menu__link">Истории</a>
                    <ul class="main-menu-dropdown">
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                    </ul>
                </li>
                <li class="main-menu__item {{ is_active('users.*') }}">
                    <a href="{{ route('users.list') }}" class="main-menu__link">Пользователи</a>
                    <ul class="main-menu-dropdown">
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                        <li class="main-menu-dropdown__item"><a href="#" class="main-menu-dropdown__link">Dropdown link</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        @guest
            <div class="auth-menu">
                <ul class="auth-menu__list">
                    <li class="auth-menu__item">
                        <a href="{{ route('login') }}" class="ajax auth-menu__link"
                           data-toggle="modal"
                           data-url="{{ route('login') }}" data-name="Войти"
                           data-modal-size="modal-sm">

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>

                            {{ __('Войти') }}
                        </a>
                    </li>
                </ul>
            </div>
        @else
                <!--<li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            {{ __('Выйти') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>-->


                @include('main.components.users.user_menu_top')

        @endguest

        <!--<div class="search">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" class="search__form rounded">
        </div>-->

    </div>
</header>



{{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">--}}
    {{--<div class="container">--}}
        {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
            {{--{{ config('app.name', 'Laravel') }}--}}
        {{--</a>--}}
        {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}

        {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
            {{--<!-- Left Side Of Navbar -->--}}
            {{--<ul class="navbar-nav mr-auto">--}}

            {{--</ul>--}}

            {{--<!-- Right Side Of Navbar -->--}}
            {{--<ul class="navbar-nav ml-auto">--}}
                {{--<!-- Authentication Links -->--}}
                {{--@guest--}}
                    {{--<li class="nav-item">--}}
                        {{--<a href="{{ route('login') }}" class="ajax-modal nav-link" data-toggle="modal" data-url="{{ route('login') }}" data-name="Войти" data-modal-size="modal-sm">{{ __('Войти') }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>--}}
                    {{--</li>--}}
                {{--@else--}}
                    {{--<li class="nav-item dropdown">--}}
                        {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                            {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                        {{--</a>--}}

                        {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                            {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                               {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                {{--{{ __('Logout') }}--}}
                            {{--</a>--}}

                            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                {{--@csrf--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                {{--@endguest--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}
