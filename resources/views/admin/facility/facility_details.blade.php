@extends('admin.master')
@section('title')
    Facility
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('facility-details.store')}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <h3>Facility page information</h3>
                        <div class="form-group">
                            <label >Facility Name</label>
                            <div class="col-md-4">
                                <select class=" form-control rounded-2" name="facility_id">
                                    <option disabled selected >--Select Facility--</option>
                                    @foreach ($facilities as $facility)
                                        <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Title</label>
                            <div class="col-md-4">
                                <input type="text" name="title" class="form-control" placeholder="Facility Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Image</label>
                            <div class="col-md-4">
                                <input type="file" name="image" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Facility Description</label>
                           
                            <textarea name="description" class="form-control summernote" cols="10" rows="5" placeholder="Facility Description"></textarea>
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
                        <th>Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($facilityDetails as $data)
                        <tr>
                            <td><img src="{{ asset($data->image) }}" style="height: 100px"></td>
                            <td>{{ $data->facility->name ?? null }}</td>
                            
                            <td>{{ $data->title ?? null }}</td>

                           <td>{!! $data->description !!}</td>
                           
                            <td >
                                <a href="{{ route('facility-details.edit',$data->id) }}" class="btn btn-primary btn-sm editProduct">Edit</a>
                                
                        <form action="{{ route('facility-details.destroy',$data->id) }}" class="pt-1" id="deteleCategory" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm editProduct" onclick="return confirm('Are you sure you want to delete?')"> Delete</button>
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
