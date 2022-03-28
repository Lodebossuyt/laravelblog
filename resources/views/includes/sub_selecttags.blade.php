<li>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="parent_id" value="{{$sub_index->id}}" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
            {{$sub_index->name}}
        </label>
    </div>
</li>
@if($sub_index->tags)
    <ul>
        @if(count($sub_index->tags) > 0)
            @foreach($sub_index->tags as $childtags)
                @include('includes.sub_selecttags',['sub_index'=>$childtags])
            @endforeach
        @endif
    </ul>
@endif
