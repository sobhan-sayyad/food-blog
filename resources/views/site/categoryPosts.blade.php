@extends('layouts.site')
@section('content')
    <div class="page-content">
        <div class="uk-container">
            <div data-uk-filter="target: .js-filter">
                <ul class="js-filter uk-grid uk-grid-small uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l"
                    data-uk-grid>
                    @foreach ($posts as $post)
                    <li data-tags="spicy">
                        <div class="product-item">
                            <div class="product-item__box">
                                <div class="product-item__intro">
                                    <div class="product-item__not-active">
                                        <div class="product-item__media">
                                            <div class="uk-inline-clip uk-transition-toggle uk-light"
                                                data-uk-lightbox="data-uk-lightbox">
                                                <a href="{{Storage::url($post->image)}}">
                                                    <img src="{{Storage::url($post->image)}}" alt="Creamy Melt Pizza">
                                                    <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary"></div>
                                                    <div class="uk-position-center">
                                                        <span class="uk-transition-fade" data-uk-icon="icon: search;"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="product-item__whish"><i class="fas fa-heart"></i></div>
                                        </div>
                                        <div class="product-item__title">
                                            <a href="{{route('site.postPage',[$category->title,$post->id])}}">{{$post->title}}</a>
                                        </div>
                                        <div class="product-item__desc">{{$post->short_content}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <hr>
                {{$posts->render()}}
            </div>
        </div>
    </div>
@endsection
