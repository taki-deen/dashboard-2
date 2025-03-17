@extends('layouts.dashboard')

@section('content')

@push('css')
<style>
    
</style>
@endpush
<h1>product index</h1>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
  create product
</button>
<table class="table  product-table" >
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

    </tbody>
</table>


@include('super-admin.products.components.create')
@push('js')
<script>

$(document).ready(function(){

// Set up CSRF token in AJAX requests
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Initialize DataTable
$('.product-table').DataTable({
    ajax: '{{ route("super.product.index") }}',
    columns: [ // Fix 'cols' to 'columns'
        { data: 'name' },
        { data: 'description' },
        { data: 'stock' },
        { data: 'price' },
        { data: 'action' },
    ],
});

// Handle form submission
$('#create-form').on('submit', function(e){
    e.preventDefault();
    
    $.ajax({
        url: "{{ route('super.product.create') }}",
        method: "POST",
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'), // Include CSRF token
            "name": $("#name").val(),
            "description": $("#description").val(),
            "stock": $("#stock").val(),
            "price": $("#price").val(),
        },
        success: function(res){
            console.log(res);
            $("#createModal").modal('hide');
            $('.product-table').DataTable().ajax.reload(); // Fix reload syntax
        },
        error: function(err){ // Fix 'err' to 'error'
            console.log(err);
        }
    });
});

});

</script>
@endpush
@endsection