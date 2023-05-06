@extends("layout")

@section("content")
    <form action="{{route("login")}}" method="post" class="form">
        @csrf
        <label for="login" class="form__label">
            Login:
            <input type="text" name="login" id="login" class="form__label">
        </label>
        <label for="password" class="form__label">
            Password:
            <input type="password" name="password" id="password" class="form__label">
        </label>
        <button type="submit" class="form__submit">Login</button>
    </form>

    <style>
        .form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
    </style>
@endsection
