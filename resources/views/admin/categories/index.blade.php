@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-12">
            <h1>All Categories</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Categorie name</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Deleted at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="7">
                        <form action="{{action('App\Http\Controllers\AdminCategoriesController@store')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="d-flex">
                                <div class="form-group mr-4">
                                    <input type="text" class="form-control" id="title" placeholder="Category"
                                           name="name">
                                </div>
                                <button name="form" type="submit" class="btn btn-primary">SUBMIT <i
                                        class="fa fa-angle-right ml-2"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                        <td>
                            @if($category->deleted_at != null)
                                {{$category->deleted_at->diffForHumans()}}
                            @endif
                        </td>
                        <td>
                            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            @if($category->deleted_at != null)
                                <a href="{{route('categories.restore', $category->id)}}" class="btn btn-warning mr-2">Restore</a>
                            @else
                                <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
