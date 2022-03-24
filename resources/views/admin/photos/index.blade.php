@extends('layouts.admin')
@section('content')
    <h1>photos</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>location</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @foreach($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td>
                    <img height="62" src="{{$photo->file ? asset($photo->file) : 'http://via.placeholder.com/62'}}" alt="{{$photo->name}}">
                </td>
                <td>{{$photo->file}}</td>
                <td>{{$photo->created_at->diffForHumans()}}</td>
                <td>{{$photo->updated_at->diffForHumans()}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="w-100 d-flex justify-content-center">
        {{$photos->render()}}
    </div>

@endsection()
