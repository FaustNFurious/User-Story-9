<x-Layout>


    <div class="container-fluid">

        <div class="row justify-content-center align-items-center my-5">
            <div class="col-12 text-center">
                <h3 class="display-2 text-light">{{ __('ui.details_of_article') }}: {{ $article->title }}</h3>
            </div>
        </div>

        <div class="row justify-content-center align-items-center my-5">
            <div class="col-12 col-md-6">

                @if ($article->images->count() > 0)

                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($article->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100 rounded shadow" alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                </div>
                            @endforeach
                        </div>

                        @if ($article->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif

                    </div>

                @else

                    <img src="https://picsum.photos/600/400" alt="Immagine casuale" class="img-fluid rounded shadow d-block w-100">

                @endif

            </div>
        </div>

        <div class="row justify-content-center align-items-center my-5">
            <div class="col-12 col-md-8 text-center text-light">
                <h4 class="display-5">{{ __('ui.title') }}: {{ $article->title }}</h4>
                <h6>{{ __('ui.price') }}: {{ $article->price }} €</h6>
                <p class="mt-4">{{ __('ui.description') }}: {{ $article->description }}</p>
            </div>
        </div>

    </div>


</x-Layout>