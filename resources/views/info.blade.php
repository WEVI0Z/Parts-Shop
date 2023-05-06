@extends("layout")

@section("content")
    <section class="catalog">
        <h2 class="catalog__title">{{$part->name}}</h2>
        <p class="catalog__price">{{$part->price}}</p>
        <p class="catalog__price">Liked: {{count($part->favourites)}}</p>
        <img class="catalog__image" src="{{asset($part->image)}}" width="200" height="200" alt="">
        <p class="catalog__description">{{$part->description}}</p>
        <ul class="catalog__parameters parameters">
            @foreach($part->parameters as $parameter)
                <li class="parameters__item">
                    <p class="parameters__title">{{$parameter->title}}</p>
                    <p class="parameters__info">{{$parameter->info}}</p>
                </li>
            @endforeach
        </ul>
        @if(count(\App\Models\Favourite::query()->where("user_id", "=", \Illuminate\Support\Facades\Auth::user()->id)->where("product_id", "=", $part->id)->get()) == 0)
            <a href="{{route("add-to-favourites", ["id" => $part->id])}}" class="catalog__like">Add to favourites</a>
        @endif
    </section>
    @include("popular")
@endsection
