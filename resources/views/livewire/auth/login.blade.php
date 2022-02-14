<div class="row">
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h5 class="text-center text-muted">Login</h5>
    <form wire:submit.prevent="login">

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

        <div class="mb-3 form-check">
            <input wire:model.lazy="remember" type="checkbox" class="form-check-input">
            <label class="form-check-label">Remember Me</label>
        </div>

        <button type="submit" class="btn btn-dark">
            Login
            <div wire:loading wire:target="login">
                <div class="spinner-border spinner-border-sm"></div>
            </div>
        </button>

        <div class="text-center mt-3">
            <span wire:click="$emitUp('showRegisterFromEvent' , true)" style="cursor: pointer">Don't hanve account?</span>
        </div>
    </form>
</div>
