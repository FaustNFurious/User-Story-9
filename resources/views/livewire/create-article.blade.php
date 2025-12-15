<form wire:submit.prevent="store" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">{{ __('ui.title') }}</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model="title" id="title" value="{{old('title')}}">
        @error('title')
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">{{ __('ui.description') }}</label>
        <textarea class="form-control @error('description') is-invalid @enderror" cols="30" rows="5" wire:model="description" id="description">{{old('description')}}</textarea>
        @error('description')
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">{{ __('ui.price') }}</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" wire:model="price" id="price" value="{{old('price')}}">
        @error('price')
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">{{ __('ui.category') }}</label>
        <select name="category" id="category" wire:model="category" class="form-select @error('category') is-invalid @enderror" required>
            <option value="">{{ __('ui.select_category') }}</option>

            @foreach($categories as $category)
                <option value="{{$category->id}}">{{ __("ui.$category->name") }}</option>
            @endforeach
            
        </select>
        @error('category')
            <div class="alert alert-danger mt-2">
                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="file" wire:model="temporary_images" multiple class="form-control @error('temporary_images.*') is-invalid @enderror" placeholder="{{ __('ui.upload_images') }}">
        @error('temporary_images.*')
            <div class="alert alert-danger mt-2">
                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
            </div>
        @enderror
        @error('temporary_images')
            <div class="alert alert-danger mt-2">
                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
            </div>
        @enderror
    </div>

    <!-- facciamo un controllo: se l’array $images non è vuoto, allora vedremo un’altra porzione, dedicata alla PREVIEW DELLE IMMAGINI -->
    @if (!empty($images))
        <div class="row">
            <div class="col-12">
                <h5>{{ __('ui.photo_preview') }}</h5>

                <div class="row border border-5 rounded">
                    @foreach ($images as $key => $image)
                        <div class="col d-flex flex-column justify-content-center align-items-center mb-2">
                            <div class="img-preview mx-auto shadow rounded" style="background-image: url('{{ $image->temporaryUrl() }}');">
                                <!-- div per far apparire l'immagine preview -->
                            </div>
                            
                            <button type="button" class="btn btn-danger btn-sm mt-2" wire:click="removeImage({{ $key }})">{{ __('ui.remove_img') }}</button>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    @endif

    
    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-primary">{{ __('ui.create_article') }}</button>
    </div>


</form>