<div wire:ignore.self class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="edit">

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
                        Edit
                        <div wire:loading wire:target="edit">
                            <div class="spinner-border spinner-border-sm"></div>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
