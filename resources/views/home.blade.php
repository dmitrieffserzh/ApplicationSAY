@push('add_styles')
    <link href="{{ asset('main/css/likes.css') }}" rel="stylesheet">
    <link href="{{ asset('main/css/comments.css') }}" rel="stylesheet">
    <link href="{{ asset('main/css/views.css') }}" rel="stylesheet">
@endpush

@extends('main.main')

@section('home_news')

    <section class="section">

        @php($count = 1)
        @foreach($posts as $post)
            <div class="@if( $count == 1) col-lg-6 p-0 m-0 float-left @else col-lg-3 p-0 m-0 float-left @endif">
                @include('main.content.news.partials.tiles.big_tile', ['content' => $post])
            </div>
            @php( $count++ )
        @endforeach

    </section>
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <h5 class="pt-5 text-uppercase font-weight-bold">Популярное <span style="font-weight: 100" class="text-muted">за неделю</span></h5>
    <section class="section mb-3">
        <div class="row">
            @php($count = 1)
            @foreach($posts as $post)
                <div class="@if( $count == 1 ) col-lg-6  @else col-lg-3 @endif">
                    @include('main.content.news.partials.tiles.big_tile', ['content' => $post])
                </div>
                @php( $count++ )
            @endforeach
        </div>
    </section>

@endsection

@section('aside')

    <h6 class="text-uppercase border-bottom border-gray pb-2 text-primary">Боковая колонка</h6>
    <ul class="aside-menu">
        <li><a href="{{ route('users.list') }}">Пользователи</a></li>
        <li><a href="{{ route('news.index') }}">Новости</a></li>
        <li><a href="{{ route('stories.index') }}">Истории</a></li>

        @if(Auth::check())
            @if( Auth::user()->role == 'editor' || Auth::user()->is_admin())
                <li><a href="{{ route('admin.dashboard') }}">Панель управления</a></li>
            @endif
        @endif

        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ route('login') }}" class="ajax-modal main-menu__link" data-toggle="modal"
                   data-url="{{ route('login') }}" data-name="Войти" data-modal-size="modal-sm">Войти</a></li>
            <li><a href="{{ route('register') }}">Регистрация</a></li>
        @else
            <li>
                <a href="{{ route('users.profile', Auth::id()) }}">
                    {{ Auth::user()->nickname }}
                </a>

            </li>

            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                    Выйти
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

        @endif
    </ul>



    <h6 class="text-uppercase text-primary mt-5">Новости</h6>

    @foreach($hot_posts as $post)
        <div class="">
            @include('main.content.news.partials.list.list', ['content' => $post])
        </div>
    @endforeach
@endsection
