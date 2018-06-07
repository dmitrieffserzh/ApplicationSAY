<article class="article pt-3 pb-3 border-bottom border-gray">
    <header class="article-header">
        <div class="media pb-3 lh-100">
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

                <a class="text-dark small font-weight-bold li" href="{{ route('users.profile', $post->owner->id) }}"
                   title="{{ $post->owner->nickname }}">
                    {{ $post->owner->nickname }}
                </a>

                <span class="d-block text-muted small font-weight-light font-monospace">
                        {{ $post->created_at->diffForHumans() }}
                    </span>
            </div>
        </div>
        <h5 class="">
            <a href="{{ route('stories.view', $post->id) }}">
                {{ $post->title }}
            </a>
        </h5>
    </header>
    <div class="article-content">
        {!! $post->content !!}
    </div>
    <footer class="article-footer pt-2 lh-100">

        @include('main.components.comments-count.comments_count', ['content'=>$post])
        @include('main.components.views.view_count', ['content'=>$post])
        @include('main.components.likes.like', ['content'=>$post])

    </footer>
</article>