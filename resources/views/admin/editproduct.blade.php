@extends('layouts.appadmin')

@section('title')
    Edit Product
@endsection

@section('content')
<div class="container">
            <hr>
            <div class="row">
                <div class="col-sm-12 bg-info text-center" style="border-radius: 10px; padding: 10px; font-family: Bookman Old Style;">
                    <h3><em>Create Read Update Delete APP In Laravel</em></h3>
                </div>
            </div>
            <hr>
            @include('layouts.alert')
            <div class="row">
                <div class="col-md-6 offset-md-3">
                        {!! Form::open(['action'=>'ProductController@updateproduct','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        {{Form::hidden('product_id',$selectProduct->id)}}
                            <div class="form-group">
                                {{Form::label('product_name','Product Name')}}
                                {{Form::text('product_name',$selectProduct->product_name,['class'=>'form-control','placeholder'=>'Enter Product Name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('price','Product Price')}}
                                {{Form::number('price',$selectProduct->price,['class'=>'form-control','placeholder'=>'Enter Product Price'])}}
                            </div>
                            <p>Product image </p>
                            <div class="custom-file mb-3">
                                {{Form::label('product_image','Product Image',['class'=>'custom-file-label','for'=>'customFile'])}}
                                {{Form::file('product_image',['class'=>'custom-file-input','id'=>'customFile'])}}
                            </div>
                                {{Form::submit('Update Product',['class'=>'btn btn-primary'])}}
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection
