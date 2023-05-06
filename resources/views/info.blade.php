@extends("layout")

@section("content")
    <style>
        .catalog {
            padding: 10px;
            max-width: 1100px;
            display: flex;
            margin: auto;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 20px;

            text-align: center;

            background-color: #f5ebe0;
        }

        .catalog__image {
            object-fit: cover;
            border-radius: 10px;
        }

        .catalog__description {
            font-size: 24px;
            text-align: left;
        }

        .catalog__price {
            margin: 10px 0;
            font-size: 24px;
        }
        .catalog--left {
            padding: 20px;
        }

        .parameters {
            font-size: 24px;
        }

        .parameters__item {
            display: flex;
            justify-content: space-between;
        }

        .parameters__title {
            border-bottom: 2px solid black;
        }

        .parameters__info {
            border-bottom: 2px solid black;
        }

        .catalog__like {
            margin-right: 20px;
            padding: 10px 20px;

            color: white;

            background-color: #d6ccc2;
        }
    </style>

    <section class="catalog">
        <div class="catalog--right">
            <h2 class="catalog__title">{{$part->name}}</h2>
            <p class="catalog__price">Price: {{$part->price}}$</p>
            <p class="catalog__price">Liked: {{count($part->favourites)}}</p>
            <img class="catalog__image" src="{{asset($part->image)}}" width="600" height="400" alt=""></div>
        <div class="catalog--left">
            <p class="catalog__description">{{$part->description}}</p>
            <ul class="catalog__parameters parameters">
                @foreach($part->parameters as $parameter)
                    <li class="parameters__item">
                        <p class="parameters__title">{{$parameter->title}}:</p>
                        <p class="parameters__info">{{$parameter->info}}</p>
                    </li>
                @endforeach
            </ul>
            @if(count(\App\Models\Favourite::query()->where("user_id", "=", \Illuminate\Support\Facades\Auth::user()->id)->where("product_id", "=", $part->id)->get()) == 0)
                <a href="{{route("add-to-favourites", ["id" => $part->id])}}" class="catalog__like">Add to favourites</a>
            @endif
        </div>
    </section>
    @include("popular")
@endsection
