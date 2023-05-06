<section class="categories">
    <ul class="categories__list">
        @foreach($categories as $category)
            <li class="categories__item">
                <a href="{{route("category", ["category" => $category])}}" class="categories__link">
                    {{$category}}
                </a>
            </li>
        @endforeach
    </ul>
</section>
