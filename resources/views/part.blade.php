<style>
    .parts {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }

    .part {
        padding: 10px;
        max-width: 350px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-bottom: 20px;

        text-align: center;

        background-color: #f5ebe0;
    }

    .part__image--wrapper {
        width: 350px;
        height: 200px;
        overflow: hidden;
        border-radius: 10px;
    }

    .part__image {
        object-fit: cover;
        transition: all 0.5s ease;
    }

    .part:hover .part__image, .part:focus .part__image {
        transform: scale(1.3);
    }

    .part:hover, .part:focus {
        opacity: 1;
    }

    .part__price {
        margin: 10px 0;
        font-size: 24px;
    }
</style>

    <a href="{{route("info", ["id" => $part->id])}}" class="part part__link">
        <h3 class="part__title">{{$part->name}}</h3>
        <div class="part__image--wrapper">
            <img src="{{asset($part->image)}}" width="350" height="200" alt="" class="part__image">
        </div>
        <p class="part__description">{{$part->description}}</p>
        <p class="part__price">{{$part->price}}$</p>
    </a>
