@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Products</h1>
        @if(Session::has('user_message'))
            <p class="ml-5 alert alert-info">{{session('user_message')}}</p>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Product Categories</th>
                <th>Brand</th>
                <th>Name</th>
                <th>Keywords</th>
                <th>Body</th>
                <th>created</th>
                <th>updated</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($products)
                @foreach($products as $product)

                    <tr>
                        <td>{{$product->id}}</td>
                        <td>
                            <img width="auto" height="62"
                                 src="{{$product->photo ? asset('img/products/' . $product->photo->file) : 'http://via.placeholder.com/62'}}"
                                 alt="{{$product->name}}">
                        </td>
                        <td>{{$product->productcategory ? $product->productcategory->name : "no categories"}}</td>
                        <td>{{$product->brand ? $product->brand->name : "no brand"}}</td>
                        <td>{{$product->name}}</td>
                       <td>
                           @if($product->keywords)
                               @foreach($product->keywords as $keyword)
                                   <span class="badge badge-pill badge-success">{{$keyword->name}}</span>
                               @endforeach
                           @endif
                       </td>
                        <td>{{$product->body}}</td>
                        <td>{{$product->created_at->diffForHumans()}}</td>
                        <td>{{$product->updated_at->diffForHumans()}}</td>
                        <td class="d-flex">
                            <a class="btn btn-warning mr-1" href="#">Edit</a>
                            <form action="#" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
            @endif
            <tr>
                <td colspan="8 alert alert-warning">
                    {{session('products_message')}}
                </td>
            </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-center w-100">
            {{$products->links()}}
        </div>
    </div>
@endsection
