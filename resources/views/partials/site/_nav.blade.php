<header class="page-header">
    <div class="page-header__top">
        <div class="uk-container">
            <nav class="uk-navbar-container uk-navbar-transparent" data-uk-navbar="">
                <div class="uk-navbar-left"><button class="uk-button" type="button" data-target="#offcanvas"
                        data-uk-toggle data-uk-icon="menu"></button>
                    <ul class="uk-navbar-nav">
                        <li><a href="{{ route('site.index') }}">Home</a></li>
                        <li><a href="page-catalog-sidebar.html">Order Online</a></li>
                        <li><a href="page-blog-article.html">Your Wishlist</a></li>
                    </ul>
                </div>
                <div class="uk-navbar-center">
                    <div class="logo">
                        <div class="logo__box"><a class="logo__link" href="index.html"> <img
                                    class="logo__img logo__img--full" src="{{ asset('site/img/logo.png') }}"
                                    alt="logo"><img class="logo__img logo__img-small"
                                    src="{{ asset('site/img/logo-small.png') }}" alt="logo"></a></div>
                    </div>
                </div>
                <div class="uk-navbar-right"><a class="uk-button" href="page-pizza-builder.html"> <span>Make Your
                            Pizza</span><img class="uk-margin-small-left" src="{{ asset('site/img/icons/pizza.png') }}"
                            alt="pizza"></a>
                    <ul class="uk-navbar-nav">
                        <li><a href="page-catalog.html">Our Menu</a></li>
                        <li><a href="page-blog.html">Latest News</a></li>
                        <li><a href="page-contacts.html">Contact us</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="page-header__bottom">
        <div class="uk-container">
            <div class="uk-navbar-container uk-navbar-transparent" data-uk-navbar="">
                <div class="uk-navbar-left">
                    <div>
                        <div class="block-with-phone"><img src="{{ asset('site/img/icons/delivery.svg') }}"
                                alt="delivery" data-uk-svg>
                            <div> <span>For Delivery, Call us</span><a href="tel:13205448749">1-320-544-8749</a></div>
                        </div>
                    </div>
                </div>
                <div class="uk-navbar-center"></div>
                <div class="uk-navbar-right">
                    <div class="other-links">
                        <ul class="other-links-list">
                            <li><a href="#modal-full" data-uk-toggle><span data-uk-icon="search"></span></a></li>
                            @if (isset($logedUser->id))
                              @if ($logedUser->type == 'user')
                                <li><a href="{{ route('site.userProfile',$logedUser) }}"><span data-uk-icon="user"></span></a></li>
                              @endif
                              @if ($logedUser->type == 'admin')
                                <li><a href="{{ route('admin.dashboard') }}"><span data-uk-icon="user"></span></a></li>
                              @endif
                            @else
                              <li><a href="{{ route('admin.signup') }}"><span data-uk-icon="user"></span></a></li>
                            @endif
                            @if (isset($logedUser->id))
                              <li><a href="#modal-logout" data-uk-toggle><span data-uk-icon="warning"></span></a></li>
                            @endif
                        </ul>
                        @if (isset($logedUser->id))
                          @if ($logedUser->type == 'user')
                          <a class="uk-button" href="{{route('site.index')}}"> <span>{{$logedUser->first_name}} {{$logedUser->last_name}}</span><img
                            class="uk-margin-small-left" src="{{ asset('site/img/icons/pizza.png') }}"
                            alt="pizza"></a>
                          @endif
                          @if ($logedUser->type == 'admin')
                          <a class="uk-button" href="{{route('admin.dashboard')}}"> <span>{{$logedUser->first_name}} {{$logedUser->last_name}}</span><img
                            class="uk-margin-small-left" src="{{ asset('site/img/icons/pizza.png') }}"
                            alt="pizza"></a>
                          @endif
                          @else
                          <a class="uk-button" href="{{route('admin.signup')}}"> <span>ورود/ثبت نام</span><img
                          class="uk-margin-small-left" src="{{ asset('site/img/icons/pizza.png') }}"
                          alt="pizza"></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
