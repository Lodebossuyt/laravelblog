@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Create Tag</h1>
        <form action="{{route('tags.update', $tag->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="tag">Tag:</label>
                <input class="form-control" type="text" name="name" id="tag" placeholder="{{$tag->name}}">
            </div>
            <button type="submit" class="btn btn-success">Update Tag</button>
        </form>
    </div>
@endsection
