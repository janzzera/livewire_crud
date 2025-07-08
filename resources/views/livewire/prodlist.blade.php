<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S#</th>
                <th>Code</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $index => $product)
                <tr>
                    <td>{{ $products->firstItem() + $index }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>${{ $product->price }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <span class="text-danger">No products found.</span>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
