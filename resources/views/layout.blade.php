<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Inter:wght@100&display=swap" rel="stylesheet">
    <title>{{$title ?? "Parts Shop"}}</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Cuprum', sans-serif;
    }

    a {
        color: black;
        text-decoration: none;

        transition-duration: 0.2s;
        transition-property: all;
    }

    a:hover, a:focus {
        text-decoration: underline;
        opacity: 0.5;
    }

    a:active {
        opacity: 0.7;
    }

    ul {
        padding: 0;

        list-style-type: none;
    }

    main {
        max-width: 1200px;
        padding: 20px;
        margin: auto;
    }

    form {
        display: flex;
        width: 350px;
        margin: auto;
        padding: 20px;
        flex-direction: column;

        background-color: #edede9;
        border-radius: 10px;
    }

    label {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
        font-size: 20px;
    }

    input {
        font-size: 20px;

        background: none;
        border: none;
        border-bottom: 2px solid black;
    }

    textarea {
        background: none;
    }

    input:focus {
        outline: none;
    }

    form button {
        margin-right: 20px;
        padding: 10px 20px;
        margin-bottom: 20px;

        color: white;
        border: none;

        background-color: #d6ccc2;
    }

    form button:hover {
        opacity: 0.5;
        cursor: pointer;
    }

    .parameters__list {
        display: flex;
        flex-direction: column;
    }

    .parameters h3 {
        font-size: 24px;
    }

    .parameters__item {
        display: flex;
    }

    .parameters__item input {
        width: 150px;
    }
</style>
<body>
    @include("header")

    <main>
        @include("alerts")
        @yield("content")
    </main>
</body>
</html>
