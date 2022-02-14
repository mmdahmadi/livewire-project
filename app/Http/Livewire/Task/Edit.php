<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Edit extends Component
{
    public $task, $title, $description, $status;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'status' => 'required'
    ];

    protected $listeners = ['showEditForm'];

    public function showEditForm(Task $task)
    {
        $this->task = $task;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->status = $task->status;

        $this->emit('showEditModal');
    }

    public function edit()
    {
        $this->validate();

        try {
            $this->task->update([
                'title' => $this->title,
                'description' => $this->description,
                'status' => $this->status,
            ]);

            $this->emitTo('task.notification', 'flashMessage', 'success', 'Task Updated');
            $this->emitTo('task.index', 'refresh');
            $this->emit('hideEditModal');

        } catch (\Exception $e) {
            $this->emitTo('task.notification', 'flashMessage', 'error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.task.edit');
    }
}
