@extends("layout")

@section("content")
    <form action="{{route("register")}}" method="post" class="form">
        @csrf
        <label for="login" class="form__label">
            Login:
            <input type="text" name="login" id="login" class="form__label">
        </label>
        <label for="password" class="form__label">
            Password:
            <input type="password" name="password" id="password" class="form__label">
        </label>
        <label for="password_confirmation" class="form__label">
            Password confirmation:
            <input type="password" name="password_confirmation" id="password_confirmation" class="form__label">
        </label>
        <button type="submit" class="form__submit">Register</button>
    </form>

    <style>
        .form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
    </style>
@endsection
