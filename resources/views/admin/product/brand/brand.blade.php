@extends('admin.master')
@section('title')
    Service
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('brand.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <h3>Brand page information</h3>
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input type="text" class="form-control" rows="5" name="name" id="name" placeholder="Brand Name">
                        </div>
                        <div class="form-group">
                            <label>Brand Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Description</label>
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
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset($brand->image) }}" style="height: 100px"></td>
                            <td>{{ $brand->name ?? null }}</td>
                            <td>
                                @if ($brand->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($brand->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td >
                                <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                        <!-- text-->
                        <form action="{{ route('brand.destroy',$brand->id) }}" class="pt-2" id="deteleCategory" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm editProduct"  onclick="return confirm('Are you sure to Delete?')" > Delete</button>
                        </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
