@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Create Tag</h1>
        <form action="{{route('tags.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tag">Tag:</label>
                <input class="form-control" type="text" name="name" id="tag">
            </div>
            <ul>
                @if($tags)
                    @foreach($tags as $tag)
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="parent_id" value="{{$tag->id}}" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    {{$tag->name}}
                                </label>
                            </div>
                        </li>
                        <ul>
                            @if(count($tag->childtags))
                                @foreach($tag->childtags as $childtags)
                                    @include('includes.sub_selecttags',['sub_index'=>$childtags])
                                @endforeach
                            @endif
                        </ul>
                    @endforeach
                @endif
            </ul>
            <button type="submit" class="btn btn-success">Add Tag</button>
        </form>
    </div>
@endsection
