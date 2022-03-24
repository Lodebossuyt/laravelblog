@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Post replies</h1>
        <p>Display {{$replies->count()}} of {{$replies->total()}}</p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>E-mail</th>
                <th>Body</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($replies)
                @foreach($replies as $replie)
                    <tr>
                        <td>{{$replie->id}}</td>
                        <td>{{$replie->user->name}}</td>
                        <td>{{$replie->user->email}}</td>
                        <td>{{$replie->body}}</td>
                        <td>{{$replie->created_at->diffForHumans()}}</td>
                        <td>{{$replie->updated_at->diffForHumans()}}</td>
                        <td>
                            <div class="d-flex">
                                @if($replie->is_active)
                                    <form action="{{route('replies.update',$replie->id)}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="is_active" value="0">
                                        <button type="submit" data-toggle="tooltip" data-placement="top" title="Post replie approved" class="btn btn-success mr-1"><i class="fas fa-unlock"></i></button>
                                    </form>
                                @else
                                    <form action="{{route('replies.update',$replie->id)}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="is_active" value="1">
                                        <button class="btn btn-danger mr-1">
                                            <i class="fas fa-lock"></i>
                                        </button>
                                    </form>
                                @endif
                                <a href="{{route('home.post', $replie->comment->post)}}" class="btn btn-info mr-1"><i class="fas fa-eye">Post</i></a>
                                <a href="" class="btn btn-success mr-1"><i class="fas fa-eye">Replies</i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif

            </tbody>
            {{$replies->links()}}
        </table>
    </div>

@endsection
