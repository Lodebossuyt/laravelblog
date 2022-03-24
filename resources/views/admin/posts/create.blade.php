@extends('layouts.admin')
@section('content')


        <div class="col-10 mx-auto">
            <h1>Create Post</h1>
            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                </div>
                <div class="form-group">
                    <textarea name="body" id="body" placeholder="Description" cols="100%" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="categories">Category (CTRL + CLICK multiple select)</label>
                    <select class="form-control custom-select-lg" name="categories[]" id="categories" multiple>
                        @foreach($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="file" name="photo_id" id="ChooseFile">
                </div>
                <button type="submit" class="btn btn-primary">Add Post <i class="fa fa-angle-right ml-2"></i></button>
            </form>
            @include('includes.form_error')
        </div>

@endsection
