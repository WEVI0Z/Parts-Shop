<header class="header">
    <nav class="header__navigation">
        <a href="{{route("main")}}" class="header__main-link">
            <h1 class="header__title">Parts Shop</h1>
        </a>
        <ul class="header__links">
            <li><a href="{{route("catalog")}}" class="header__link">Catalog</a></li>
            <li><a href="#" class="header__link">Info</a></li>
            <li><a href="#" class="header__link">About us</a></li>
        </ul>
        <ul class="header__buttons">
            @if(!\Illuminate\Support\Facades\Auth::user())
                <li>
                    <a href="{{route("login")}}" class="header__button">Login</a>
                </li>
                <li>
                    <a href="{{route("register")}}" class="header__button">Register</a>
                </li>
            @else
                @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                    <li>
                        <a href="{{route("create-part")}}" class="header__button">Create part</a>
                    </li>
                @endif
                <li>
                    <a href="{{route("logout")}}" class="header__button">Logout</a>
                </li>
            @endif
        </ul>
    </nav>
</header>
