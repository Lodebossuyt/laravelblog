@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Tags</h1>
        <ul>
            @if($tags)
                @foreach($tags as $tag)
                    <div class="d-flex align-items-center my-2">
                        <li>{{$tag->name}}</li>
                        <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-1">
                                Delete
                            </button>
                        </form>
                        <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-warning ml-1"> Edit </a>
                    </div>

                    <ul>
                        @if(count($tag->childtags))
                            @foreach($tag->childtags as $childtags)
                                @include('includes.sub_index',['sub_index'=>$childtags])
                            @endforeach
                        @endif
                    </ul>
                @endforeach
            @endif
        </ul>
    </div>
@endsection
