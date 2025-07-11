<div>
    {{-- Stop trying to control. --}}
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <!-- @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession -->
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Edit Product
                    </div>
                    <div class="float-end">
                        <a href="{{ route('productlist') }}" class="btn btn-primary btn-sm" wire:navigate>&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit="editProduct">
                        <div class="mb-3 row">
                            <label for="code" class="col-md-4 col-form-label text-md-end text-start">Code</label>
                            <div class="col-md-6">
                                <input type="text" wire:model="code"
                                    class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ $product->code }}">
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input type="text" wire:model="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $product->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-end text-start">Quantity</label>
                            <div class="col-md-6">
                                <input type="number" wire:model="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ $product->quantity }}">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="price" class="col-md-4 col-form-label text-md-end text-start">Price</label>
                            <div class="col-md-6">
                                <input type="number" wire:model="price"
                                    step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $product->price }}">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                            <div class="col-md-6">
                                <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $product->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="imageurl" class="col-md-4 col-form-label text-md-end text-start">Upload Image</label>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $product->imageurl) }}" alt="Current Image" style="max-width: 150px; height: auto;">
                                </div>
                                <input type="file" class="form-control @error('imageurl') is-invalid @enderror" wire:model="imageurl"
                                        id="imageurl" name="imageurl">
                                @error('imageurl')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
</div>
