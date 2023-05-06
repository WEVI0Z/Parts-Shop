@extends("layout")

@section("content")
    <section class="catalog">
        <h2 class="catalog__title">Catalog</h2>
        <ul class="parts">
            @foreach($parts as $part)
                <li class="part">
                    @include("part")
                </li>
            @endforeach
        </ul>
        <div class="pagination">
            {{$parts->links("vendor.pagination.semantic-ui")}}
        </div>
    </section>
    @include("categories")
@endsection
