<section class="popular">
    <h2 class="popular__title">Popular parts</h2>
    <ul class="parts">
        @foreach($popularParts as $part)
            <li class="part">
                <a href="#" class="part__link">
                    <h3 class="part__title">Lorem ipsum</h3>
                    <img src="" alt="" class="part__image">
                    <p class="part__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, sit.</p>
                    <p class="part__price">100$</p>
                </a>
            </li>
        @endforeach
    </ul>
    <a href="#" class="popular__link">Show all</a>
</section>
