<div class="d-flex align-items-center my-2">
    <li>{{$sub_index->name}}</li>
    <form action="{{route('tags.destroy', $sub_index->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger ml-1">
            Delete
        </button>
    </form>
    <a href="{{route('tags.edit', $sub_index->id)}}" class="btn btn-warning ml-1"> Edit </a>
</div>
@if($sub_index->tags)
    <ul>
        @if(count($sub_index->tags) > 0)
            @foreach($sub_index->tags as $childtags)
                @include('includes.sub_index',['sub_index'=>$childtags])
            @endforeach
        @endif
    </ul>
@endif
