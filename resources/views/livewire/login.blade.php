<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form wire:submit="authenticate" class="mx-auto" style="max-width: 400px;">
        <!-- @csrf -->

        <label for="name" class="form-label">Username</label>
        <input type="text" name="name" wire:model="name" 
               class="form-control @error('name') is-invalid @enderror" 
               value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror

        <label for="password" class="form-label mt-3">Password</label>
        <input type="password" name="password" wire:model="password" 
               class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary w-100 mt-4">Login</button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('register') }}" wire:navigate>Register an account</a>
    </div>
</div>
