<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Create extends Component
{
    public $title, $description, $status;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'status' => 'required'
    ];

    public function create()
    {
        $this->validate();

        try {
            Task::Create([
                'title' => $this->title,
                'description' => $this->description,
                'status' => $this->status,
            ]);

            $this->reset(['title', 'description', 'status']);

            $this->emitTo('task.notification', 'flashMessage', 'success', 'Task Created');
            $this->emitTo('task.index', 'refresh');

        } catch (\Exception $e) {
            $this->emitTo('task.notification', 'flashMessage', 'error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.task.create');
    }
}
