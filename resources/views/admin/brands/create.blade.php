@extends('layouts.admin')
@section('content')


    <div class="col-10 mx-auto">
        <h1>Create Brand</h1>
        <form action="{{route('brands.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="title" placeholder="Title" name="name">
            </div>
            <div class="form-group">
                <textarea name="description" id="body" placeholder="Description" cols="100%" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Brand <i class="fa fa-angle-right ml-2"></i></button>
        </form>
        @include('includes.form_error')
    </div>

@endsection
