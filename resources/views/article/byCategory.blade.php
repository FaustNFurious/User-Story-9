<x-Layout>


    <div class="container-fluid">

        <div class="row justify-content-center align-items-center my-5">
            <div class="col-12 text-center">
                <h2 class="display-2 text-light">Articoli nella categoria: {{ $category->name }}</h2>
            </div>
        </div>

        <div class="row justify-content-center align-items-center my-5">
            @forelse($articles as $article)
                <div class="col-12 col-md-4">
                    <x-Card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-light display-6">Nessun articolo trovato in questa categoria!</p>
                    @auth
                        <a href="{{ route('article.create') }}" class="btn btn-primary my-5">Crea il primo articolo in questa categoria</a>
                    @endauth
                </div>
            @endforelse
        </div>

    </div>


</x-Layout>