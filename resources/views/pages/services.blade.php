@extends('layouts.app')

@section('title')
    Services
@endsection

@section('content');

    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-4 col-md-4">
                <div class="thumbnail">
                    <img src="images/{{$product->product_image}}" alt="">
                    <div class="caption">
                        <h3>{{$product->product_name}}</h3>
                        <div class="clearfix">
                            <div class="pull-left price">
                                $ {{$product->price}}
                            </div>
                            <a href="" class="btn btn-success pull-right" role="button">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
