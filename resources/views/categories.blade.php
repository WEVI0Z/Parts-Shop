<style>
    .categories {
        margin-top: 40px;
        width: 100%;
        background-color: #edede9;
    }

    .categories__list {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .categories__link {
        display: block;
        padding: 15px 0;
        width: 100%;
        height: 100%;
    }
</style>

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
