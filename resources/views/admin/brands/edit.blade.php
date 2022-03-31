@extends('layouts.admin')
@section('content')


    <div class="col-10 mx-auto">
        <h1>Edit Category</h1>
        <form action="{{route('brands.update',$brand->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <input type="text" value="{{$brand->name}}" class="form-control" id="name" placeholder="category" name="name">
            </div>
            <div class="form-group">
                <textarea name="description" id="" cols="30" rows="10">{{$brand->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
        </form>
    </div>

@endsection
