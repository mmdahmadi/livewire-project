<div>
    <div class="row mt-5">
        <div class="col-md-4 offset-md-4">
            <livewire:task.notification />
        </div>
    </div>

    <div class="row">
        <div class="col-md-4" style="border-right: 2px solid #a1a6ac">
            <livewire:task.create />
        </div>
        <div class="col-md-8">
            <livewire:task.index />
        </div>
    </div>

    {{-- Edit Model --}}
    <livewire:task.edit />
</div>
