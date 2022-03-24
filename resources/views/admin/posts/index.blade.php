@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>POSTS</h1>
                <form>
                    <input type="text" name="search" class="form-control bg-gray-300 border-0 small"
                           placeholder="Search for..." aria-label="Search"
                           aria-describedby="basic-addon2">
                </form>
            </div>
        </div>

        @if(Session::has('user_message'))
            <p class="ml-5 alert alert-info">{{session('user_message')}}</p>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo_Post</th>
                <th>Owner</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Deleted</th>
                <th>created</th>
                <th>updated</th>
                <th>Actions</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @if($posts)
                @foreach($posts as $post)

                    <tr>

                        <td>{{$post->id}}</td>
                        <td>
                            <img width="auto" height="62"
                                 src="{{$post->photo ? asset($post->photo->file) : 'http://via.placeholder.com/62'}}"
                                 alt="{{$post->title}}"></td>
                        <td>@if($post->deleted_at == null)
                                {{$post->user ? $post->user->name : 'Username not known'}}
                            @endif</td>
                        <td>
                            @if($post->categories)
                                @foreach($post->categories as $category)
                                    <span class="badge badge-pill badge-success">{{$category->name}}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td>
                            @if($post->deleted_at != null)
                                {{$post->deleted_at->diffForHumans()}}
                            @endif
                        </td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        <td class="d-flex">
                            <a class="btn btn-warning mr-1" href="{{route('posts.edit', $post->id)}}">Edit</a>
                            <a class="btn btn-secondary mr-1" href="{{route('posts.show', $post)}}">Show</a>
                            <a class="btn btn-success" href="{{route('home.post', $post)}}"><i class="fas fa-eye"></i></a>
                        </td>
                        <td>

                            <form action="{{route('posts.destroy',$post->id)}}" method="POST">
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
                    {{session('user_message')}}
                </td>
            </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-center w-100">
            {{$posts->links()}}
        </div>
    </div>
@endsection
