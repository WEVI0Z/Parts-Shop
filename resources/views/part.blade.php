<div class="part">
    <a href="{{route("info", ["id" => $part->id])}}" class="part__link">
        <h3 class="part__title">{{$part->name}}</h3>
        <img src="{{asset($part->image)}}" width="200" height="200" alt="" class="part__image">
        <p class="part__description">{{$part->description}}</p>
        <p class="part__price">{{$part->price}}$</p>
    </a>
</div>
