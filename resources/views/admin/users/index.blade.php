@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Users</h1>
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
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>
                    <img height="62" src="{{$user->photo ? asset($user->photo->file): 'https://via.placeholder.com/150'}}" alt="{{$user->name}}">
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>@foreach($user->roles as $role)
                        <span class="badge badge-pill badge-success">{{$role->name}}</span>
                    @endforeach</td>
                <td>{{$user->is_active ? 'Levend' : 'Dood'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>
                    @if($user->deleted_at != null)
                        {{$user->deleted_at->diffForHumans()}}
                        @endif
                </td>
                <td>
                    <div class=" d-flex align-items-center">
                        @if($user->deleted_at != null)
                            <a href="{{route('users.restore', $user->id)}}" class="btn btn-warning mr-2">Restore</a>
                        @else
                            {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminUsersController@destroy', $user->id]]) !!}
                            {!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endif
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Update</a>
                    </div>

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="w-100 d-flex justify-content-center">
        {{$users->render()}}
    </div>
</div>
@endsection()
