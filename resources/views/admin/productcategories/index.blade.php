@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Product Categories</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>ProductCategory name</th>
                    <th>description</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productcategories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                        <td>
                            <a href="{{route('productcategories.edit', $category->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>

                                <form action="{{route('productcategories.destroy',$category->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
