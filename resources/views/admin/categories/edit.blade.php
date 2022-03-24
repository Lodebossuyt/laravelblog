@extends('layouts.admin')
@section('content')


        <div class="col-10 mx-auto">
            <h1>Edit Category</h1>
            <form action="{{route('categories.update',$category->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" value="{{$category->name}}" class="form-control" id="name" placeholder="category" name="name">
                </div>
                <button type="submit" class="btn btn-primary">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
            </form>
        </div>

@endsection
