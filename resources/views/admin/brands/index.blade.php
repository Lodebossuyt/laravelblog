@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-12">
            <h1>All Brands</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Brand name</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td>{{$brand->id}}</td>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->description}}</td>
                        <td>{{$brand->created_at}}</td>
                        <td>{{$brand->updated_at}}</td>
                        <td>
                            <a href="{{route('brands.edit', $brand->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('brands.destroy',$brand->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
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
