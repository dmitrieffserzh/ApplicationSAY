@push('add_styles')
    <link href="{{ asset('main/css/likes.css') }}" rel="stylesheet">
    <link href="{{ asset('main/css/comments.css') }}" rel="stylesheet">
    <link href="{{ asset('main/css/views.css') }}" rel="stylesheet">
    <link href="{{ asset('main/css/services.css') }}" rel="stylesheet">
@endpush
@push('add_scripts')
    <script src="{{ asset('/main/js/jq_hotkeys.js') }}" defer></script>
    <script src="{{ asset('/main/js/wysiwyg.js') }}" defer></script>
@endpush

@extends('main.main')

@section('content')

    <section class="section">
        <div class="media pb-3 border-bottom border-gray lh-100">
               <span class="d-inline-block position-relative mr-2">
                   <img class="rounded-circle" style="width: 30px; height: 30px;"
                        src="{{ getImage('thumbnail', $post->owner->profile->avatar) }}"
                        alt="{{ $post->owner->nickname }}">
                   @if($post->owner->isOnline())
                       <span class="component-status component-status--online"></span>
                   @else
                       <span class="component-status component-status--offline"></span>
                   @endif
               </span>
            <div class="media-body">
                @if(Auth::check())
                    @include('main.components.service.service_menu', ['content' => $post])
                @endif
                <a class="text-dark small font-weight-bold" href="{{ route('users.profile', $post->owner->id) }}"
                   title="{{ $post->owner->nickname }}">
                    {{ $post->owner->nickname }}
                </a>
                <span class="d-block text-muted small font-weight-light font-monospace">
                        {{ $post->created_at->diffForHumans() }}
                    </span>
            </div>
        </div>

        <!--<div class="float-right">
            <a class="btn btn-primary btn-sm" href="{{ route('stories.index') }}"> Назад</a>
        </div>-->

        <h1 class="h5 mt-4 mb-3">{{ $post->title}}</h1>

        {!! $post->content !!}

        @include('main.components.comments-count.comments_count', ['content'=>$post])
        @include('main.components.views.view_count', ['content'=>$post])
        @include('main.components.likes.like', ['content'=>$post])


    </section>

    <section class="section col p-0 mt-4 border-top border-gray">
        @include('main.components.comments.list')
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
@endsection