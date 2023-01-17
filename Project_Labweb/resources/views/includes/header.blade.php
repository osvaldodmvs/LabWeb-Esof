<div class="container-fluid viral_blue_bg_color">
    <nav class="navbar navbar-expand-md navbar-light fixed-position" style="font-weight:700">
        <div class="container-fluid">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav col-md-4">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('/storage/img/header_logo_viral.png') }}" alt="header logo">
                    </a>
                </ul>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Center Side Of Navbar -->
                <ul class="navbar-nav col-md-6 align-items-center justify-content-center" style="font-family: Saira,sans-serif">
                    <li class="nav-item px-1">
                        @if(Route::currentRouteName() == 'home')
                            <a class="nav-link text-white btn_blue_hover rounded curr_page" href="{{ route('home') }}">{{ __('INICIO') }}</a>
                        @else
                            <a class="nav-link text-white btn_blue_hover rounded" href="{{ route('home') }}">{{ __('INICIO') }}</a>
                        @endif
                    </li>
                    <li class="nav-item px-1">
                        @if(Route::currentRouteName() == 'viral')
                            <a class="nav-link text-white btn_blue_hover rounded curr_page" href="{{ route('viral') }}">{{ __('VIRAL') }}</a>
                        @else
                            <a class="nav-link text-white btn_blue_hover rounded" href="{{ route('viral') }}">{{ __('VIRAL') }}</a>
                        @endif
                    </li>
                    <li class="nav-item px-1">
                        @if(Route::currentRouteName() == 'products')
                            <a class="nav-link text-white btn_blue_hover rounded curr_page" href="{{ route('products') }}">{{ __('PRODUTOS') }}</a>
                        @else
                            <a class="nav-link text-white btn_blue_hover rounded" href="{{ route('products') }}">{{ __('PRODUTOS') }}</a>
                        @endif
                    </li>
                    <li class="nav-item px-1">
                        @if(Route::currentRouteName() == 'events')
                            <a class="nav-link text-white btn_blue_hover rounded curr_page" href="{{ route('events') }}">{{ __('EVENTOS') }}</a>
                        @else
                            <a class="nav-link text-white btn_blue_hover rounded" href="{{ route('events') }}">{{ __('EVENTOS') }}</a>
                        @endif
                    </li>
                    <li class="nav-item px-1">
                        @if(Route::currentRouteName() == 'contacts')
                            <a class="nav-link text-white btn_blue_hover rounded curr_page" href="{{ route('contacts') }}">{{ __('CONTACTOS') }}</a>
                        @else
                            <a class="nav-link text-white btn_blue_hover rounded" href="{{ route('contacts') }}">{{ __('CONTACTOS') }}</a>
                        @endif
                    </li>
                    <hr>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav col-md-6 align-items-center justify-content-end">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                    </li>
                    @endif
                    
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                    </li>
                    @endif
                    @else
                    @if (Auth::user()->is_admin)
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('dashboard') }}">{{ __('DASHBOARD') }}</a>
                    </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a href="{{route('account')}}" class="dropdown-item">{{ __('Conta') }}</a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('LOGOUT') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @if (!Auth::user()->is_admin)
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('cart_index') }}" style="padding-top:15px"><h4><i class="bi bi-cart3"></i></h4></a>
                    </li>
                    @endif
                </div>
            </li>
            @endguest
        </ul>
    </div>
</div>
</nav>
</div>