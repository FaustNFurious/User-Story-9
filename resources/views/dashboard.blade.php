<x-Layout>


    <!-- Success Message when you create a new article -->
    @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif


    <div class="container-fluid px-4 py-5">
        
        <div class="d-flex justify-content-between align-items-center text-light">
            <h2>{{ __('ui.dashboard') }}</h2>
            <h3 class="display-3">{{ __('ui.hello') }}, {{ Auth::user()->name }}</h3>
        </div>
        
        <div class="my-5 text-light">
            <h5>{{ __('ui.user_details') }}</h5>
            <p class="card-text">{{ __('ui.name') }}: {{ Auth::user()->name }}</p>
            <p class="card-text">{{ __('ui.email') }}: {{ Auth::user()->email }}</p>
            <p class="card-text">{{ __('ui.registration_date') }}: {{ Auth::user()->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-warning">{{ __('ui.logout') }}</button>
        </form>

        <!-- User's Articles Section -->
        <div class="row justify-content-center align-items-center my-5 text-light">

            <h4 class="text-center my-5 display-4">{{ __('ui.all_your_articles') }}</h4>

            @forelse (Auth::user()->articles as $article)
                <div class="col-12 col-md-3">
                    <x-Card :article="$article" /> 
                </div>
            @empty
                <div class="col-12 my-5 text-center">
                    <h5 class="text-center">{{ __('ui.no_articles_inserted') }}</h5>
                    <a href="{{ route('article.create') }}" class="btn btn-primary my-5">{{ __('ui.create_new_article') }}</a>
                </div>
            @endforelse

        </div>
        
    </div>


</x-Layout>