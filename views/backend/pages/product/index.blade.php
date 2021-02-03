@extends('backend.layouts.master')

@section('title')
    Insert Product Page
@endsection

@section('admin-content')
 <div class="container">
     @include('backend.layouts.partials.message')
    <div class="card">
        <div class="card-header">
            <h4>Product Page </h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.product.create') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="title" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" id="exampleInputPassword1" class="form-control" cols="80" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" class="form-control" name="price" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="number" class="form-control" name="quantity" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file" class="form-control" name="product_image" id="exampleInputEmail1">
                </div>
                <button type="submit" class="btn btn-primary">Add product</button>
            </form>
      </div>
 </div>
@endsection
