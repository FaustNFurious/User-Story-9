<x-Layout>



    <div class="container-fluid">

        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-12 text-center my-5">
                <h1 class="display-2 text-light">Benvenuto nella UserStory</h1>
                <p class="display-6 lead text-light">Condividi i tuoi articoli e leggi quelli degli altri utenti!</p>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-Card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h2 class="text-center">Nessun articolo ancora inserito</h2>
                </div>
            @endforelse
        </div>

    </div>    



</x-Layout>