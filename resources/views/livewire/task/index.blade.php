<div>
    {{-- Filter Form --}}
    <form wire:submit.prevent="$refresh" class="row g-3 mb-5">
        <div class="col-auto">
            <label>Title</label>
            <input wire:model.defer="search" type="text" class="form-control form-control-sm">
        </div>

        <div class="col-auto">
            <label>Status</label>
            <select wire:model.defer="status" class="form-control form-control-sm">
                <option value="">Choose One</option>
                <option value="pending">Task Pending</option>
                <option value="completed">Task Completed</option>
            </select>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-sm btn-primary mt-4">
                Filter
            </button>
        </div>
    </form>

    <div wire:loading>
        Loading ...
    </div>

    {{-- <div wire:loading.remove> --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $index => $task)
                    <tr>
                        <th scope="row">{{ $tasks->firstItem() + $index }}</th>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <div class="d-flex">
                                <button wire:click="delete({{ $task->id }})" class="btn btn-sm btn-danger">Delete</button>
                                <button wire:click="$emitTo('task.edit' , 'showEditForm' , {{ $task->id }})" class="btn btn-sm btn-info ms-3">Edit</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    {{-- </div> --}}

    <div class="d-flex justify-content-center mt-5">{{ $tasks->links() }}</div>
</div>
