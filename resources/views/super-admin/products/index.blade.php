@extends('layouts.dashboard')

@section('content')

@push('css')
<style>
    /* Custom styles (if needed) */
</style>
@endpush

<h1>Product Index</h1>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
  Create Product
</button>

<table class="table product-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <!-- Corrected the edit link route format -->
                <a href="{{ route('super.product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('super-admin.products.components.create')
@endsection
