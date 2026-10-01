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
                    <form class="form-horizontal" action="{{route('store.category.services')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <h3>Category page information</h3>
                        <div class="form-group">
                            <label >Category Name</label>
                            <div class="col-md-4">
                                <select class=" form-control select2 rounded-2" name="category_id">
                                    <option disabled selected >--Select Category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Service title</label>
                            <input type="text" class="form-control" rows="5" name="name" id="name" placeholder="Service title">
                        </div>
                        <div class="form-group">
                            <label>Service Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Service Short Description</label>
                            <textarea id="summernote"  class="form-control" col="30" row="30" name="short_details"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Service long Description</label>
                            <textarea  id="summernote" class="form-control" col="10" row="30" name="long_details"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="service_home">
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
                        <th>Category Name</th>
                        <th>Service Title</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categoryServices as $service)
                        <tr>
                            <td><img src="{{ asset($service->image) }}" style="height: 100px"></td>
                            <td>{{ $service->category->name ?? null }}</td>
                           <td>{{ $service->name }}</td>
                            <td>
                                @if ($service->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($service->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td >
                                <a href="{{ route('edit.category.services',['id'=>$service->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>
                                
                        <form action="" class="pt-1" id="deteleCategory" method="POST">
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
