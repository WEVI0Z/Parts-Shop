<section class="popular">
    <h2 class="popular__title">Popular parts</h2>
    <ul class="parts">
        @foreach($popularParts as $part)
            <li class="part">
                @include("part")
            </li>
        @endforeach
    </ul>
    <a href="{{route("catalog")}}" class="popular__link">Show all</a>
</section>
