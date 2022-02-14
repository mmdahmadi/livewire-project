<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search, $status;

    protected $listeners = ['refresh' => '$refresh'];

    protected $paginationTheme = 'bootstrap';

    public function delete(Task $task)
    {
        $task->delete();
        $this->emitTo('task.notification', 'flashMessage', 'error', 'Task Deleted');
    }

    public function render()
    {
        $search = $this->search;
        $status = $this->status;

        return view('livewire.task.index', [
            'tasks' => Task::when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', '%' . $search . '%');
            })->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })->latest()
                ->paginate(5)
        ]);
    }
}
