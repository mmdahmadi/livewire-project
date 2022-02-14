<div class="row mt-5">
    <div class="col-md-6 offset-md-3">
        <h4 class="mb-3">Create Product : </h4>
        <form wire:submit.prevent="create">

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input wire:model.defer="title" type="text" class="form-control">
                @error('title')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea wire:model.defer="description" rows="3" class="form-control"></textarea>
                @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input wire:model.defer="price" type="text" class="form-control">
                @error('price')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" wire:model.defer="image" type="file" id="formFile">
                @error('image')
                    <label class="form-text text-danger">{{ $message }}</label>
                @enderror
            </div>

            <div wire:loading wire:target="image" >
                Uploading ...
            </div>
            @if ($image)
                <div>
                    Photo Preview :
                    <img width="200" src="{{ $image->temporaryUrl() }}" alt="">
                </div>
            @endif

            <button type="submit" wire:loading.attr="disabled" wire:target="image" class="btn btn-primary">
                Create
                <div wire:loading wire:target="create">
                    <div class="spinner-border spinner-border-sm"></div>
                </div>
            </button>
        </form>
    </div>
</div>
