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

    
    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-primary">{{ __('ui.create_article') }}</button>
    </div>


</form>