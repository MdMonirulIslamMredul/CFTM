@extends('admin.master')
@section('title')
    doctor edit
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
                <div class="card-body">
                    <form action="{{route('update.doctor')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{$doctor->id}}" name="id">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" rows="5" name="name" value="{{$doctor->name}}" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control" rows="5" name="designation" value="{{$doctor->designation}}" id="designation" placeholder="Designation">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" rows="5" name="email" value="{{$doctor->email}}" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Select Services</label>
                            <select class="form-control" name="service_id">
                                <option disabled selected>Select Services</option>
                                @foreach($services as $service)

                                    <option value="{{$service->id}}" {{$service->id == $doctor->service_id ? 'selected':''}}>{{$service->service_title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <img src="{{asset($doctor->image)}}" class="mb-2" height="100" width="100" alt="">

                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="add_home">
                                <option value="1" @if ($doctor->add_home == 1) selected @endif>Yes</option>
                                <option value="0" @if ($doctor->add_home == 0) selected @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($doctor->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($doctor->status == 0) selected @endif>Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
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
