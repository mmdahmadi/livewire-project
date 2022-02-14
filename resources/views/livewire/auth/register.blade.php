<div class="row">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        Go to <strong wire:click="$emitUp('showRegisterFromEvent' , false)" style="cursor: pointer">Login</strong> page.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h5 class="text-center text-muted">Register</h5>
    <form wire:submit.prevent="register">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input wire:model.lazy="name" type="text" class="form-control">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input wire:model.lazy="email" type="email" class="form-control">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input wire:model.lazy="password" type="password" class="form-control">
            @error('password')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input wire:model.lazy="passwordConfirm" type="password" class="form-control">
            @error('passwordConfirm')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark">
            Register
            <div wire:loading wire:target="register">
                <div class="spinner-border spinner-border-sm"></div>
            </div>
        </button>
    </form>
</div>
