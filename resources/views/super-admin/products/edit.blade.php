@extends('layouts.dashboard')

@section('content')

<h1>Edit Product</h1>

<form action="{{ route('super.product.update', $product->id) }}" method="POST">
    @csrf
    @method('PATCH') <!-- Simulate PATCH request -->

    <input type="hidden" name="id" value="{{ $product->id }}">

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
    </div>
    
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
    </div>
    
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Update Product</button>
    <a href="{{ route('super.product.index') }}" class="btn btn-secondary">Cancel</a>
</form>

@endsection
