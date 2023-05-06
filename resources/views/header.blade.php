<style>
    .header {
        width: 100%;

        background-color: #edede9;
    }

    .header__navigation {
        max-width: 1200px;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
    }

    .header__links {
        display: flex;
        flex-wrap: wrap;
    }

    .header__link {
        margin-right: 20px;
    }

    .header__buttons {
        display: flex;
        flex-wrap: wrap;
    }

    .header__button {
        margin-right: 20px;
        padding: 10px 20px;

        color: white;

        background-color: #d6ccc2;
    }
</style>

<header class="header">
    <nav class="header__navigation">
        <a href="{{route("main")}}" class="header__main-link">
            <h1 class="header__title">Parts Shop</h1>
        </a>
        <ul class="header__links">
            <li><a href="{{route("catalog")}}" class="header__link">Catalog</a></li>
            <li><a href="{{route("favourites")}}" class="header__link">Favourites</a></li>
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
