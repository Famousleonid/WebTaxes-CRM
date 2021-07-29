<nav class="navbar navbar-expand-lg navbar-dark  p-0" id="i-menu">
    <div class="container p-0">
        <div class="d-flex flex-grow-1">
            <a class="navbar-brand ml-5" href="/"><img class="" src="{{asset('img/sova-logo.png')}}" width="80" alt="logo"></a>
            <div class="w-100 text-right">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="myMenu">
            <ul class="navbar-nav ml-auto flex-nowrap">
                <li class="nav-item pr-lg-2 ml-auto"><a href="{{route('howitwork')}}" class="nav-link pl-2 item-howitwork">{{ __('How it works') }}</a></li>
                <li class="nav-item pr-lg-2 ml-auto"><a href="{{route('main_price')}}" class="nav-link pl-2 item-price">{{ __('Pricing') }}</a></li>
                <li class="nav-item pr-lg-2 ml-auto"><a href="{{route('faq')}}" class="nav-link item-faq">{{ __('FAQs') }}</a></li>
                <li class="nav-item pr-lg-5 item-contact"><a href="#about-contact" class="scroll-contact nav-link ">{{ __('Contact Us') }}</a></li>
                @guest
                    <li class="nav-item  pr-lg-3 pl-lg-3"><a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item pr-lg-3"><a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a></li>
                    @endif
                @else

                    <div class="item-dropdown">

                        <ul class="navbar-nav">
                        <a id="navbarDropdown" class="dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>


                            <div class="dropdown-menu text-right">
                                @if ( Auth::user()->isAdmin())
                                    <li><a class="dropdown-item text-right" href="{{route('admin.index')}}">{{ __('Admin Area') }}</a></li>
                                @else
                                    <li><a class="dropdown-item text-right" href="{{route('cabinet')}}">{{ __('Personal Area') }}</a></li>
                                @endif

                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </ul>
                    </div>

                @endguest
            </ul>
        </div>
    </div>
</nav>
