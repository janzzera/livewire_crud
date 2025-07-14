<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <form wire:submit="store" class="mx-auto" style="max-width: 400px;">
        <!-- @csrf -->

        <h4 class="mb-4 text-center">Register</h4>

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

        <label for="password2" class="form-label mt-3">Confirm Password</label>
        <input type="password" name="password2" wire:model="password2"
               class="form-control @error('password2') is-invalid @enderror">
        @error('password2')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary w-100 mt-4">Register</button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('login') }}" wire:navigate>Go back to login</a>
    </div>
</div>
