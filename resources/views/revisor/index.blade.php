<x-Layout>


    <div class="container-fluid">
        
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="row my-5 justify-content-center align-items-center">
            <div class="col-12 text-center">
                <h3 class="display-2 text-light">{{ __('ui.dashboard_revisor') }}</h3>
            </div>
        </div>

        <!-- Se c'è un articolo da revisionare, allora si vedranno i seguenti dettagli -->
        @if ($article_to_check)
            <div class="row my-5 justify-content-center align-items-center">

            @if ($article_to_check->images->count())

                @foreach ($article_to_check->images as $key => $image)
                    <div class="col-9 col-md-6">
                        <img src="{{ $image->getUrl(300, 300) }}" alt="Immagine {{ $key + 1 }} dell'articolo {{ $article_to_check->title }}" class="img-fluid rounded mb-2">
                    </div>

                    <div class="col-md-5 ps-3">
                        <div class="card-body">

                        <h4 class="text-light">Labels</h4>

                        @if ($image->labels)
                            @foreach ($image->labels as $label)
                                #{{ $label }},
                            @endforeach
                        @else
                            <p>No Labels</p>
                        @endif

                        </div>
                    </div>

                    <div class="col-md-8 ps-3">
                        <div class="card-body">

                            <h4 class="text-light">Ratings</h4>

                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto">
                                        {{ $image->adult }}
                                    </div>
                                </div>
                                <div class="col-10">adult</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto">
                                        {{ $image->spoof }}
                                    </div>
                                </div>
                                <div class="col-10">spoof</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto">
                                        {{ $image->medical }}
                                    </div>
                                </div>
                                <div class="col-10">medical</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto">
                                        {{ $image->violence }}
                                    </div>
                                </div>
                                <div class="col-10">violence</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto">
                                        {{ $image->racy }}
                                    </div>
                                </div>
                                <div class="col-10">racy</div>
                            </div>

                        </div>
                    </div>

                @endforeach

            @else
            
                <div class="col-9 col-md-6">
                    <div class="row justify-content-center align-items-center">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-12 col-md-4 text-center">
                                <img src="https://picsum.photos/300" alt="immagine articolo" class="img-fluid rounded mb-3">
                            </div>
                        @endfor
                    </div>
                </div>
            
            @endif

                <div class="col-md-4 d-flex flex-column justify-content-between">

                    <div class="mb-4 text-light">
                        <h2 class="mb-3">{{ $article_to_check->title }}</h2>
                        <h4 class="mb-3">{{ __('ui.author') }}: {{ $article_to_check->user->name }}</h4>
                        <p class="mb-3">{{ __('ui.price') }}: {{ $article_to_check->price }} €</p>
                        <h4 class="mb-3">{{ __('ui.category') }}: {{ $article_to_check->category->name }}</h4>
                        <p class="mb-3">{{ __('ui.description') }}: {{ $article_to_check->description }}</p>
                    </div>

                    <!-- Form Accetta e Rifiuta articolo -->
                    <div class="d-flex justify-content-between">
                        <form action="{{ route('revisor.acceptArticle', ['article' => $article_to_check]) }}" method="POST" class="me-2">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-lg w-100">{{ __('ui.accept') }}</button>
                        </form>

                        <form action="{{ route('revisor.rejectArticle', ['article' => $article_to_check]) }}" method="POST" class="ms-2">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger btn-lg w-100">{{ __('ui.reject') }}</button>
                        </form>
                    </div>

                </div>

            </div>

        @else

            <div class="row my-5 justify-content-center align-items-center">
                <div class="col-12 text-center">
                    <h3 class="display-4 text-light">{{ __('ui.no_articles_to_review') }}</h3>
                    <a href="{{ route('Home') }}" class="btn btn-primary">{{ __('ui.return_to_home') }}</a>
                </div>
            </div>

        @endif

    </div>


</x-Layout>