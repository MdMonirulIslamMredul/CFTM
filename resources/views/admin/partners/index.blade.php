@extends('admin.master')
@section('title')
    Partner
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="name" class="form-control" id="title" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control-file" id="image" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="url">URL:</label>
                            <input type="text" name="url" class="form-control" id="url" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
                        <th>Image/File</th>
                        <th>Name</th>
                        <th>Url</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($partners as $partner)
                        <tr>
                            <td>
                                <img src="{{ asset($partner->file) }}" style="height: 100px">
                        </td>
                            <td>{{ $partner->name ?? null }}</td>
                           <td>{{ $partner->url }}</td>
                            <td>
                                @if ($partner->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($partner->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td >
                                <a href="{{ route('partner.edit',$partner->id) }}" class="btn btn-primary btn-sm editProduct">Edit</a>
                                
                        <form action="{{ route('partner.destroy',$partner->id) }}" class="pt-1" id="deteleCategory" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to Delete?')"> Delete</button>
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
