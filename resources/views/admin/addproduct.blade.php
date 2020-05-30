@extends('layouts.appadmin')

@section('title')
    Add Product
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
                        {!!Form::open(['action'=>'ProductController@saveproduct','method'=>'POST','files'=>true,'enctype'=>'multipart/form-data'])!!}
                            <div class="form-group">
                                {{Form::label('','Product Name')}}
                                {{Form::text('product_name','',['class'=>'form-control','placeholder'=>'Enter Product Name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('','Product Price')}}
                                {{Form::number('price','',['class'=>'form-control','placeholder'=>'Enter Price'])}}
                            </div>
                            <div class="custom-file mb-3">
                                {{Form::label('','Product Image',['class'=>'custom-file-label','for'=>'customFile'])}}
                                {{Form::file('product_image',['class'=>'custom-file-input','id'=>'customFile'])}}
                            </div>
                            {{Form::submit('Add Product',['class'=>'btn btn-primary'])}}
                        {!!Form::close()!!}
                </div>
            </div>
            <hr>
        <h2 style="font-family: Bookman Old Style; text-align: center;"><em>Products</em></h2>
            <br>
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <th>Product image</th>
                <th>Product Name </th>
                <th>Price </th>
                <th>Actions</th>
            </tr>
            </thead>
            <?php
                $allProducts=DB::table('products')
                                ->get();

            ?>
            <tbody>
            @foreach($allProducts as $products)
            <tr>
                <td><img src="storage/product_images/{{$products->product_image}}" alt="" style="width:50px;height:50px;"></td>
                <td>{{$products->product_name}}</td>
                <td>$ {{$products->price}}</td>
                <td>
                    <a href="/editproduct/{{$products->id}}" class="btn btn-info ">
                        <span class="glyphicon glyphicon-edit"></span>Edit
                    </a>

                    <a href="/deleteproduct/{{$products->id}}" class="btn btn-danger ">
                        <span class="glyphicon glyphicon-trash"></span>Delete
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
@endsection
