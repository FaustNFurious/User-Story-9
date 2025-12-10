<footer class="bg-body-secondary mt-auto">

    <div class="container-fluid mx-auto py-3">

        <p class="text-center text-muted mb-0">&copy; {{ date('Y') }} UserStory. {{ __('ui.all_rights_reserved') }}.</p>
        <p class="text-center text-muted mb-0">{{ __('ui.powered_by') }}</p>

        <div class="col-12 text-center mx-auto mt-4">
            <h6>{{ __('ui.want_to_become_revisor') }}</h6>
            <p>{{ __('ui.want_to_become_revisor_description') }}</p>
            <a href="{{ route('revisor.request') }}" class="btn btn-success btn-sm">{{ __('ui.become_revisor') }}</a>
        </div>

    </div>
    
</footer>