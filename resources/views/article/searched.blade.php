<x-Layout>


    <div class="container-fluid">

        <div class="row my-5 justify-content-center align-items-center">
            <div class="col-12 text-center">
                <h3 class="display-3 text-light">{{ __('ui.results_research_for') }}: "{{ $query }}"</h3>
            </div>
        </div>

        <div class="row my-5 justify-content-center align-items-center">
            @forelse($articles as $article)
                <div class="col-12 col-md-4">
                    <x-Card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h4 class="text-light">{{ __('ui.no_articles_found_by_search') }}</h4>
                </div>
            @endforelse
        </div>

        <div class="row my-5 justify-content-center align-items-center">
            <div class="col-12">
                {{ $articles->links() }}
            </div>
        </div>

    </div>


</x-Layout>