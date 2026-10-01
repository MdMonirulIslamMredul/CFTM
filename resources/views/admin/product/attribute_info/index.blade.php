@extends('admin.master')
@section('title')
    Service
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('attribute-info.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <h3>Sub Category page information</h3>
                        <div class="form-group">
                            <label >Attribute Name</label>
                            <div class="col-md-4">
                                <select class=" form-control select2 rounded-2" name="attribute_id">
                                    <option disabled selected >--Select Attribute--</option>
                                    @foreach ($attributes as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Input Field 1</label>
                            <input type="text" class="form-control" rows="5" name="name" id="name" placeholder="Enter Attribute Info">
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
                        <th>Attribute Name</th>
                        <th>name</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($attributeInfos as $attribute)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $attribute->attribute->name ?? null }}</td>
                            <td>{{ $attribute->name ?? null }}</td>

                            <td>
                                @if ($attribute->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($attribute->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td >
                                <a href="{{ route('attribute-info.edit',$attribute->id) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                        <!-- text-->
                        <form action="{{ route('attribute-info.destroy',$attribute->id) }}" class="pt-2" id="deteleCategory" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm editProduct" onclick="return confirm('Are you sure to Delete?')"> Delete</button>
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
