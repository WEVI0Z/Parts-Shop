<style>
    .popular__title {

    }

    .popular__link {
        margin-right: 20px;
        padding: 10px 20px;

        color: white;

        background-color: #d6ccc2;
    }
</style>

<section class="popular">
    <h2 class="popular__title">Popular parts</h2>
    <ul class="parts">
        @foreach($popularParts as $part)
            <li>
                @include("part")
            </li>
        @endforeach
    </ul>
    <a href="{{route("catalog")}}" class="popular__link">Show all</a>
</section>
