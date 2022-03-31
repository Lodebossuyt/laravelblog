@extends('layouts.admin')
@section('content')


    <div class="col-10 mx-auto">
        <h1>Create Product</h1>
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
            </div>
            <div class="form-group">
                <label for="brands">Brand</label>
                <select class="form-control custom-select-lg" name="brand" id="brands">
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <textarea name="body" id="body" placeholder="Description" cols="100%" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="productcategories">Categories</label>
                <select class="form-control custom-select-lg" name="category" id="productcateogries">
                    @foreach($productcategories as $productcategory)
                        <option value="{{$productcategory->id}}">{{$productcategory->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="keywords">Keywords (CTRL + CLICK multiple select)</label>
                <select class="form-control custom-select-lg" name="keywords[]" id="keywords" multiple>
                    @foreach($keywords as $keyword)
                        <option value="{{$keyword->id}}">{{$keyword->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="file" name="photo_id" id="ChooseFile">
            </div>
            <button type="submit" class="btn btn-primary">Add Product <i class="fa fa-angle-right ml-2"></i></button>
        </form>
        @include('includes.form_error')
    </div>

@endsection
