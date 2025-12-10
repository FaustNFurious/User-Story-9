<x-Layout>


    <div class="container-fluid">

        <div class="row justify-content-center align-items-center my-5">
            <div class="col-12 text-center">
                <h2 class="display-3 text-light">{{ __('ui.all_articles') }}</h2>
            </div>
        </div>

        <div class="row justify-content-center align-items-center my-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4">
                    <x-Card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h4 class="text-center text-light">{{ __('ui.no_articles_created') }}</h4>
                </div>
            @endforelse
        </div>

        <!-- Il metodo $articles->links() nella paginazione di Laravel genera un insieme di link HTML che gli utenti possono cliccare per navigare
            tra diverse pagine dei risultati paginati, fornendo un modo intuitivo per sfogliare set di dati. -->
        <div class="row justify-content-center align-items-center my-5">
            <div class="col-12 d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>

    </div>
    

</x-Layout>