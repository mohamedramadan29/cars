<div class="top">

    <div class="top_navbar">
        <div class="top_bar_links">
            <ul class="list-unstyled">
                <li> <a href="{{ url('aboutus') }}"> <i class="bi bi-person-vcard-fill"></i> {{ __('navbar.about_us') }} </a> </li>
                <li> <a href="{{ url('contactus') }}"> <i class="bi bi-envelope-open-fill"></i> {{ __('navbar.contact_us') }} </a> </li>
                <li> <a href="{{ url('privacy') }}"> <i class="bi bi-shield-fill-check"></i>  {{ __('navbar.privacy') }} </a> </li>
                <li> <a href="{{ url('terms') }}"> <i class="bi bi-file-earmark-ruled-fill"></i> {{ __('navbar.terms') }} </a>
                </li>
                {{-- <li> <a href="#"> <i class="bi bi-file-earmark-zip-fill"></i> الارشيف </a> </li> --}}
            </ul>
        </div>
        <div class="top_bar_social">
            <ul class="list-unstyled">
                <li> <a href="#"> <i class="bi bi-facebook"></i> </a> </li>
                <li> <a href="#"> <i class="bi bi-twitter-x"></i> </a> </li>
                <li> <a href="#"> <i class="bi bi-instagram"></i> </a> </li>
                <li> <a href="#"> <i class="bi bi-pinterest"></i> </a> </li>
                <li> <a href="#"> <i class="bi bi-telegram"></i> </a> </li>
                <li> <a href="#"> <i class="bi bi-youtube"></i> </a> </li>
            </ul>
        </div>
    </div>
</div>
<div class="display-mobile">
    <div class="clearfix2 mobileNav">
        <div class="rgt">
            <a href="{{ url('/') }}"><img src="{{ asset('assets/front/uploads/logo.png') }}" style="width:100px;" />
            </a>
        </div>
        <div class="lft iconPart">
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item login_nav">
                        <a href="{{ url('user/dashboard') }}">
                            <i class="bi bi-person-circle"></i> {{ __('navbar.account') }} <i class="bi bi-text-paragraph"></i> </a>
                    </li>
                @else
                    <li class="nav-item login_nav">
                        <a href="{{ url('login') }}">
                            <i class="bi bi-person-circle"></i>{{ __('navbar.login') }} <i class="bi bi-text-paragraph"></i> </a>
                    </li>
                @endif
            </ul>
            <a href="#" onclick="openNav()"><i class="fa fa-bars"></i></a>
        </div>
    </div>
</div>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="{{ url('/') }}"><i class="fa fa-home"></i> {{ __('navbar.home') }} </a>
    <a href="{{ url('user/car/add') }}"><i class="fa fa-plus"></i> {{ __('navbar.buy_car') }}</a>
    <a href="{{ url('new-cars') }}"><i class="fa fa-car"></i> {{ __('navbar.new_cars') }} </a>
    <a href="{{ url('used-cars') }}"><i class="fa fa-car"></i> {{ __('navbar.used_cars') }} </a>
    <a href="{{ url('login') }}"><i class="fas fa-user-shield"></i> {{ __('navbar.login') }} </a>
    {{-- <a href="#"><i class="fa fa-globe"></i> English </a> --}}
    <div class="clr"></div>
    <hr style="color:#333333;" />
    <div class="navink-mobile">
        <ul class="list-unstyled">
            <li><a href="{{ url('agency') }}"><i class="fas fa-building"></i> {{ __('navbar.agency') }}</a></li>
            <li><a href="{{ url('showrooms') }}"><i class="fas fa-car"></i> {{ __('navbar.rooms') }} </a></li>
            <li><a href="{{ url('rent') }}"><i class="fas fa-handshake"></i> {{ __('navbar.rent') }} </a></li>
            <li><a href="{{ url('car-numbers') }}"><i class="fas fa-sort-numeric-up"></i> {{ __('navbar.numbers') }} </a></li>
            <li><a href="{{ url('auto-repair') }}"><i class="fas fa-wrench"></i> {{ __('navbar.repair') }} </a></li>
            <li><a href="{{ url('car-wash') }}"> <img src="{{ asset('assets/icons/wash.svg') }}" alt="">
                   {{ __('navbar.wash') }} </a></li>
            <li><a href="{{ url('auctions') }}"> <img src="{{ asset('assets/icons/auction.svg') }}" alt="">
                     {{ __('navbar.auctions') }} </a></li>
            <li><a href="{{ url('products') }}"><img src="{{ asset('assets/icons/products.svg') }}" alt="">
                    {{ __('navbar.products') }} </a></li>
            <li><a href="{{ url('forums') }}"><i class="far fa-comments"></i> {{ __('navbar.forums') }} </a></li>
            <li><a href="{{ url('feature-advs') }}"> <img src="{{ asset('assets/icons/adv.svg') }}" alt="">
                     {{ __('navbar.feature_advs') }} </a></li>
            <li><a href="{{ url('subscription') }}"><i class="fas fa-star"></i> {{ __('navbar.subscription') }} </a></li>
            <li><a href="{{ url('pub') }}"> <img src="{{ asset('assets/icons/adv2.svg') }}" alt="">  {{ __('navbar.pub') }} </a></li>
        </ul>

        <div class="clr"></div>
        <hr style="color:#333333;" />
        <center>
            <img style="max-width: 140px" src="{{ asset('assets/front/uploads/logo.png') }}" />
            <div class="clr"></div>

        </center>
    </div>
</div>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.body.style.backgroundColor = "white";
    }
</script>
<div class="clr"></div>
<div style="background:white;">
    <div id="HomePage" class="display-desk">

        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ url('/') }}"><img width="140px"
                    src="{{ asset('assets/front/uploads/logo.png') }}" style /></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="{{ url('new-cars') }}"><i class="fa fa-car"></i> {{ __('navbar.new_cars') }} </a>
                    </li>
                    <li class="nav-item"><a href="{{ url('used-cars') }}"><i class="fa fa-car"></i> {{ __('navbar.used_cars') }}
                             </a></li>
                </ul>
                @if (Auth::check())
                    <a href="{{ url('user/car/add') }}" class="rgt btn gradient-btn btn-sm buy_car"
                        style="margin-right:10px;font-size:17px;font-weight:bold"> {{ __('navbar.buy_car') }} <i class="fa fa-plus"></i></a>
                @else
                    <a href="{{ url('create-car') }}" class="rgt btn gradient-btn btn-sm buy_car"
                        style="margin-right:10px;font-size:17px;font-weight:bold">  {{ __('navbar.buy_car') }} <i class="fa fa-plus"></i></a>
                @endif

                {{-- <a href="create-2.html" class="rgt btn gradient-btn btn-sm" style="margin-right:10px;"><i
                        class="fa fa-plus"></i> بيع دراجتك </a> --}}
            </div>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item login_nav">
                        <a href="{{ url('user/dashboard') }}">
                            <i class="bi bi-person-circle"></i> {{ __('navbar.account') }} <i class="bi bi-text-paragraph"></i> </a>
                    </li>
                @else
                    <li class="nav-item login_nav">
                        <a href="{{ url('login') }}">
                            <i class="bi bi-person-circle"></i> {{ __('navbar.login') }}<i class="bi bi-text-paragraph"></i> </a>
                    </li>
                    <li class="nav-item login_nav register_nav">
                        <a href="{{ url('register') }}">
                            <i class="bi bi-person-fill-add"></i> {{ __('navbar.register') }} <i class="bi bi-text-paragraph"></i>
                        </a>
                    </li>
                @endif

                <li class="nav-item countryflags">
                    <a href="#" data-toggle="modal" data-target="#flagsModal">
                        <img src="{{ asset('assets/front/uploads/iraq.png') }}" style="width:32px;height:32px;border-radius:50%" />
                    </a>
                </li>
                <div class="dropdown">
                    <button style="background: transparent;color: var(--main-color);border: none;font-weight:bold"
                        class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Config::get('app.locale') }} <i class="fas fa-globe"></i>
                    </button>
                    <ul class="dropdown-menu">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </ul>
        </nav>
    </div>
</div>
<div class="shadow display-desk">
    <div class="navbar navbar-expand-lg" id="HomePage2">
        <ul class="navbar-nav navbtm">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> {{ __('navbar.home') }} </a></li>
            <li><a href="{{ url('agency') }}"><i class="fas fa-building"></i>  {{ __('navbar.agency') }} </a></li>
            <li><a href="{{ url('showrooms') }}"><i class="fas fa-car"></i> {{ __('navbar.rooms') }} </a></li>
            <li><a href="{{ url('rent') }}"><i class="fas fa-handshake"></i>  {{ __('navbar.rent') }} </a></li>
            <li><a href="{{ url('car-numbers') }}"><i class="fas fa-sort-numeric-up"></i>  {{ __('navbar.numbers') }} </a></li>
            <li><a href="{{ url('auto-repair') }}"><i class="fas fa-wrench"></i>  {{ __('navbar.repair') }} </a></li>
            <li><a href="{{ url('car-wash') }}"> <img src="{{ asset('assets/icons/wash.svg') }}" alt="">
                {{ __('navbar.wash') }} </a></li>
            <li><a href="{{ url('auctions') }}"> <img src="{{ asset('assets/icons/auction.svg') }}" alt="">
                {{ __('navbar.auctions') }} </a></li>
            <li><a href="{{ url('products') }}"><img src="{{ asset('assets/icons/products.svg') }}" alt="">
                    {{ __('navbar.products') }} </a></li>
            <li><a href="{{ url('forums') }}"><i class="far fa-comments"></i>  {{ __('navbar.forums') }} </a></li>
            <li><a href="{{ url('feature-advs') }}"> <img src="{{ asset('assets/icons/adv.svg') }}" alt="">
                   {{ __('navbar.feature_advs') }} </a></li>
            <li><a href="{{ url('subscription') }}"><i class="fas fa-star"></i> {{ __('navbar.subscription') }} </a></li>
            <li><a href="{{ url('pub') }}"> <img src="{{ asset('assets/icons/adv2.svg') }}" alt="">  {{ __('navbar.pub') }} </a></li>
        </ul>
    </div>
</div>
