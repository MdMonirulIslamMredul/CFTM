@extends('admin.master')
@section('title')
    Appointment settings
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
                    <form class="form-horizontal" action="{{route('admission-require.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <h3>Front Page Information</h3>
                        <div class="form-group">
                            <label >Department Name</label>
                            <div class="col-md-4">
                                <select class=" form-control select2 rounded-2" name="department_id">
                                    <option disabled selected >--Select Department--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" rows="5" name="title" id="title" placeholder="Title" required>
                        </div>

                        <div class="form-group">
                            <label>Details One</label>
                            <textarea  class="summernote form-control" col="10" row="3" name="details" ></textarea>
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

                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($admission_req as $info)
                        <tr>
                            <td>{{ $info->title ?? null }}</td>
                            <td>
                                <a href="{{ route('admission-require.edit',$info->id) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
   
@endsection
