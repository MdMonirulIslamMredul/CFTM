@extends('admin.master')
@section('title')
    Facility
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('facility-details.update',$facilityDetail->id)}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <h3>Facility page information</h3>
                        <div class="form-group">
                            <label >Facility Name</label>
                            <div class="col-md-4">
                                <select class=" form-control rounded-2" name="facility_id">
                                    <option disabled selected >--Select Facility--</option>
                                    @foreach ($facilities as $facility)
                                        <option value="{{ $facility->id }}"{{ $facilityDetail->facility_id == $facility->id ?'selected' : '' }}>{{ $facility->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Title</label>
                            <div class="col-md-4">
                                <input type="text" name="title" class="form-control" placeholder="Facility Title" value="{{ $facilityDetail->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Image</label>
                            <div class="col-md-4">
                                <input type="file" name="image" class="form-control" >
                            </div>
                            <img src="{{asset($facilityDetail->image)}}" class="mb-2" height="100" width="100" alt="">
                        </div>
                        <div class="form-group">
                            <label>Facility Description</label>
                           
                            <textarea name="description" class="form-control summernote" cols="10" rows="5" placeholder="Facility Description">{{ $facilityDetail->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($facilityDetail->status == 1) selected @endif>Yes</option>
                                <option value="0" @if ($facilityDetail->status == 0) selected @endif>No</option>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
    
@endsection
