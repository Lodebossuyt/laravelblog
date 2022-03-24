@extends('layouts.admin')

@section('content')
    <h1>Media</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
        @if(count($photos) > 0)
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="62" src="{{$photo->file ? asset($photo->file) : 'https://loremflickr.com/g/62/62/cat'}}" alt=""></td>
                    <td><a href="{{route('media.edit', $photo->id)}}" class="btn btn-warning rounded-0">Edit</a></td>
                </tr>
                @endforeach
        @else
            <tr>
                <td colspan="3">
                    <p class="alert alert-info text-center">{{session('user_message')}}</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="text-center">
        {{$photos->links()}}
    </div>
@endsection
