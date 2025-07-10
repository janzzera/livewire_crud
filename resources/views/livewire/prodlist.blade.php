<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="row justify-content-center mt-3">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">Product List</div>
                <div class="card-body">
                    <a href="/product-create" class="btn btn-success btn-sm my-2" wire:navigate>
                        <i class="bi bi-plus-circle"></i> Add New Product
                    </a>

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">S#</th>
                                <th scope="col">Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                            <a href="{{ route('product-show', $product->id) }}" wire:navigate class="btn btn-warning btn-sm">
                                                <i class="bi bi-eye"></i> Show
                                            </a>

                                            <a href="{{ route('product-edit', $product->id) }}" wire:navigate class="btn btn-primary btn-sm">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>

                                            <button type="submit" wire:click="destroy({{ $product->id }})"
                                                class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <span class="text-danger">
                                            <strong>No Product Found!</strong>
                                        </span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $products->links() }}

                </div>
            </div>
        </div>
    </div>
    
</div>
