<div>
    <h4 class="mb-3">Create Task : </h4>
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
            <label class="form-label">Status</label>
            <select wire:model.defer="status" class="form-control">
                <option value="">Choose One</option>
                <option value="pending">Task Pending</option>
                <option value="completed">Task Completed</option>
            </select>
            @error('status')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Create
            <div wire:loading wire:target="create">
                <div class="spinner-border spinner-border-sm"></div>
            </div>
        </button>
    </form>
</div>
