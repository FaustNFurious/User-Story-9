<x-Layout>



    <div class="container-fluid">

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-12 text-center my-5">
                <h1 class="display-2 text-light">{{ __('ui.welcome_to_the_User_Story') }}</h1>
                <p class="display-6 lead text-light">{{ __('ui.share_read_articles') }}</p>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-Card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h2 class="text-center">{{ __('ui.no_articles_created') }}</h2>
                </div>
            @endforelse
        </div>

    </div>    



</x-Layout>