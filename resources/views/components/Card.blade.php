<div class="card mx-auto shadow text-center mb-3">
    <img src="https://picsum.photos/200/100" class="card-img-top" alt="Immagine casuale">

    <div class="card-body">

        <h4 class="card-title">{{ __('ui.title') }}: {{ $article->title }}</h4>
        <p class="card-text">{{ __('ui.description') }}: {{ $article->description }}</p>
        <p class="card-text">{{ __('ui.price') }}: {{ $article->price }}€</p>

        <div class="d-flex justify-content-evenly align-items-center">
            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary">{{ __('ui.info') }}</a>
            @if($article->category)
                <a href="{{ route('article.byCategory', ['category' => $article->category->id]) }}" class="btn btn-secondary">{{ __('ui.'.$article->category->name) }}</a>
            @else
                <span class="btn btn-secondary disabled">{{ __('ui.no_category_assigned') }}</span>
            @endif
        </div>

    </div>

</div>