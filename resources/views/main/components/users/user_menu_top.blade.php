@push('add_styles')
    <link href="{{ asset('main/css/users.css') }}" rel="stylesheet">
@endpush

    {{--@if(Auth::guest())--}}
        {{--<a href="{{ route('login') }}" class="ajax-modal component-user-top__link" data-toggle="modal"--}}
           {{--data-url="{{ route('login') }}" data-name="Войти" data-modal-size="modal-sm">Войти</a>--}}
    {{--@else--}}
        {{--<ul class="user-menu">--}}
            {{--<li class="user-menu__item">--}}

                {{--<a class="text-white" href="{{ route('users.profile', Auth::user()->id) }}"--}}
                   {{--title="{{ Auth::user()->nickname }}">{{ Auth::user()->nickname }}</a>--}}
                {{--<img class="rounded-circle"--}}
                     {{--style="width: 40px; height: 40px; border: 2px Solid rgba(255, 255, 255, 0.1);"--}}
                     {{--src="{{ getImage('thumbnail', Auth::user()->profile->avatar) }}"--}}
                     {{--alt="{{ Auth::user()->profile->nickname }}">--}}


                {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
                    {{--<a class="dropdown-item" href="#">Action</a>--}}
                    {{--<a class="dropdown-item" href="#">Another action</a>--}}
                    {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                {{--</div>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--@endif--}}


<div class="k__link dropdown d-inline-block float-right">

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path></svg>

    <a class="d-inline-block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="rounded-circle"
             style="width: 40px; height: 40px; border: 2px Solid rgba(255, 255, 255, 0.1);"
             src="{{ getImage('thumbnail', Auth::user()->profile->avatar) }}"
             alt="{{ Auth::user()->profile->nickname }}">
    </a>
</div>