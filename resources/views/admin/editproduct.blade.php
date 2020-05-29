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
            <div class="row">

                <div class="col-md-6 offset-md-3">
                        <form action="">
                            <div class="form-group">
                                <label>Product Name </label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Product Name" name="product_name">
                            </div>
                            <div class="form-group">
                                <label>Price </label>
                                <input type="number" class="form-control"  placeholder="Enter price" name="product_price">
                            </div>
                            <p>Product image </p>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="product_image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Update product</button>
                        </form>
                </div>
            </div>
        </div>
@endsection
