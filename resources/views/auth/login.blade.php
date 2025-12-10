<x-Layout>


    <div class="container-fluid mt-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card">

                    <div class="card-header">
                        <h4 class="mb-0">{{ __('ui.login') }}</h4>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('ui.email') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="alert alert-danger">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('ui.password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                @error('password')
                                    <div class="alert alert-danger">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">{{ __('ui.login') }}</button>
                            </div>

                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('register') }}" class="text-decoration-none">{{ __('ui.no_account_register') }}</a>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        
    </div>


</x-Layout>