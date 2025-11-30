<div class="card mx-auto shadow text-center mb-3">
    <img src="https://picsum.photos/200/100" class="card-img-top" alt="Immagine casuale">

    <div class="card-body">

        <h4 class="card-title">Titolo: {{ $article->title }}</h4>
        <p class="card-text">Descrizione: {{ $article->description }}</p>
        <p class="card-text">Prezzo: {{ $article->price }}€</p>

        <div class="d-flex justify-content-evenly align-items-center">
            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary">Info</a>
            @if($article->category)
                <a href="{{ route('article.byCategory', ['category' => $article->category->id]) }}" class="btn btn-secondary">{{ $article->category->name }}</a>
            @else
                <span class="btn btn-secondary disabled">Nessuna categoria assegnata</span>
            @endif
        </div>

    </div>

</div>