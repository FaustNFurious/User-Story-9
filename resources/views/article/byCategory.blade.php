<x-Layout>


    <div class="container-fluid">

        <div class="row justify-content-center align-items-center my-5">
            <div class="col-12 text-center">
                <h2 class="display-2 text-light">{{ __('ui.articles_in_category') }}: {{ __('ui.'.$category->name) }}</h2>
            </div>
        </div>

        <div class="row justify-content-center align-items-center my-5">
            @forelse($articles as $article)
                <div class="col-12 col-md-4">
                    <x-Card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-light display-6">{{ __('ui.no_articles_found_in_this_category') }}</p>
                    @auth
                        <a href="{{ route('article.create') }}" class="btn btn-primary my-5">{{ __('ui.create_first_article') }}</a>
                    @endauth
                </div>
            @endforelse
        </div>

    </div>


</x-Layout>