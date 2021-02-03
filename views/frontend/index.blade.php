@extends('frontend.layouts.master')
@section('title')
    Akij Group - Product
@endsection

@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-md-4">
            @include('frontend.layouts.partials.frontend-sidebar')
        </div>

        <div class="col-md-8">
            <div class="row">
             @foreach ($products as $product)
                <div class="col-md-4">

                    <div class="card" style="width: 12rem;">
                      @php
                          $i =1;
                      @endphp
                        @foreach ($product->image as $img)
                          @if ($i>0)
                           <img src="{{ asset('/images/'.$img->image) }}" class="card-img-top" alt="...">
                          @endif
                         @php
                             $i --;
                         @endphp
                        @endforeach
                        <div class="card-body">
                        <h5 class="card-title">{{$product->title}}</h5>
                        <p class="card-text">{{$product->price}}</p>
                        <a href="#" class="btn btn-success">Add to Cart</a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection
