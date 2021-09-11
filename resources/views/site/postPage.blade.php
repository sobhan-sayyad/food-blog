@extends('layouts.site')
@section('content')
    <div class="page-content">
        <div class="uk-margin-large-top uk-container uk-container-small">
            <article class="article-full">
                <div class="article-full__info">
                    <div class=""><i class="fas fa-calendar-alt"></i>Posted At {{ $post->created_at }}</div>
                </div>
                <div class="article-full__image">
                    <img src="{{ Storage::url($post->image) }}" alt="img-article">
                </div>
                <div class="article-full__content">
                    <h3>{{ $post->title }}</h3>
                    {!! $post->content !!}
                    <div class="article-full__bottom">
                        <div class="article-full__share">
                            <div> <strong>اشتراک گذاری</strong><i class="fas fa-share-alt"></i></div>
                            <ul>
                                <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#!"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#!"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="section-article-reviews">
                        <div class="section-title">
                            <div class="uk-h2">نظرها ({{count($comments)}})</div>
                        </div>
                        <div class="section-content">
                            <ul class="uk-comment-list">
                                @foreach ($comments as $comment)
                                    <li>
                                        <article class="uk-comment">
                                            <header class="uk-comment-header">
                                                <div class="uk-grid-small uk-grid-divider" data-uk-grid>
                                                    <div class="uk-width-auto@s">
                                                        <img class="uk-comment-avatar" src="{{ asset('site/img/blog/img-reviews-1.png') }}" alt>
                                                    </div>
                                                    <div class="uk-width-expand@s">
                                                        <div class="">
                                                            <h4 class="uk-comment-title uk-margin-remove">{{$comment->first_name}} {{$comment->last_name}}</h4>
                                                            <span class="uk-text-meta uk-margin-small-left">{{$comment->created_at}}</span>
                                                        </div>
                                                        <div class="uk-comment-body">
                                                            <p>
                                                                {{$comment->content}}
                                                            </p>
                                                                <a class="link-more" href="#!"><span data-uk-icon="arrow-right">پاسخ دهید</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </header>
                                        </article>
                                    </li>
                                @endforeach
                            </ul>
                            @if (Session::has('message'))
                                    <div class="uk-alert-message">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                            <div class="block-form">
                                <div class="section-title">
                                    <div class="uk-h2">:نظر دهید</div>
                                </div>
                                <div class="section-content">
                                    @if (isset($logedUser->id))
                                        <form action="{{ route('site.sendComment') }}" method="POST">
                                            @csrf
                                            <div class="uk-grid uk-grid-small uk-child-width-1-2@s" data-uk-grid>
                                                <div class="uk-width-1-1">
                                                    <textarea class="uk-textarea uk-form-large" placeholder="* پیام" required name="content"></textarea>
                                                </div>
                                                <div class="uk-width-1-1">
                                                    <input class="uk-input uk-form-large" type="hidden" name="post_id" value="{{ $post->id }}">
                                                </div>
                                                <div>
                                                    <button class="uk-button uk-button-large" type="submit">ثبت نظر</button>
                                                </div>
                                            </div>
                                        </form>
                                    @else

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
@endsection
