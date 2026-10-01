@extends('admin.master')
@section('title')
    Service
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">

                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                @if(session('update'))
                    <div class="alert alert-warning" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                @endif
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('category.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <h3>Category page information</h3>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" rows="5" name="name" id="name" placeholder="Category Name">
                        </div>
                        <div class="form-group">
                            <label>Category Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Category Description</label>
                            <textarea   class="form-control" col="10" row="30" name="description"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                       {{-- <th>Details</th> --}}
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td><img src="{{ asset($category->image) }}" style="height: 100px"></td>
                            <td>{{ $category->name ?? null }}</td>
                           {{-- <td>{!! $category->description ?? null !!}</td> --}}
                            <td>
                                @if ($category->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($category->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td >
                                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-sm editProduct">Edit</a>
                                
                        <!-- text-->
                        <form action="{{ route('category.destroy',$category->id) }}" class="pt-1" id="deteleCategory" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm editProduct "> Delete</button>
                        </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection
