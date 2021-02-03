@extends('backend.layouts.master')

@section('title')
    Product list page
@endsection

@section('admin-content')
 <div class="container">
     @include('backend.layouts.partials.message')

    <div class="card">
        <div class="card-header">
            <h4>Product list Page </h4>
        </div>
        <div class="card-body">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach ($products as $product)
                    <td>#</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        @php
                            $i =1;
                        @endphp

                        @foreach ($product->image as $image)
                            @if ($i>0)

                              <img src="{{ asset('/images/'.$image->image) }}" width="82">
                            @endif
                            @php
                               $i--;
                            @endphp
                        @endforeach
                    </td>
                    <td>{{$product->quantity}}</td>
                    <td>
                        <a href="{{ route('admin.product.update', $product->id) }}" class = "btn btn-primary" >Edit</a>
                        <a href="#deleteModal{{$product->id}}" data-toggle="modal"  class="btn btn-danger">Delete</a>

                        <!--Delete Modal -->
                        <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title  text-dark" id="exampleModalLabel">Are you sure to delete? </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.product.delete',$product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger" style="margin-left:0px!important;" >Permanent Delete</button>
                                </form>

                            </div>
                            <div class="modal-footer">

                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
</div>
@endsection
