@extends('layouts.admin')
@section('content')


        <div class="col-12 mx-auto">
            <h1>Edit Post</h1>
            <div class="row">
                <div class="col-6">
                    <form action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" value="{{$post->title}}" class="form-control" id="title" placeholder="Title" name="title">
                        </div>
                        <div class="form-group">
                            <textarea name="body" id="body" placeholder="Body" cols="90%" rows="10">{{$post->body}}</textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control custom-select-lg" name="categories[]" id="categories" multiple>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                        @if($post->categories->contains($category->id)) selected
                                        @endif>
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="photo_id" id="ChooseFile">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Post <i class="fa fa-angle-right ml-2"></i></button>
                    </form>
                </div>
                <div class="col-6">
                    <p>Featured Img</p>
                    <img class="img-fluid img-thumbnail" src="{{$post->photo ? asset($post->photo->file) : 'http://via.placeholder.com/400'}}" alt="{{$post->title}}">
                </div>
            </div>


        </div>
        @include('includes.form_error')
@endsection
