@extends('admin.master')
@section('title')
    Service
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('result.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <h3>Result page information</h3>
                        <div class="form-group">
                            <label >Select Subject Name</label>
                            <div class="col-md-12">
                                <select class=" form-control select2 rounded-2" name="course_id">
                                    <option disabled selected >--Select Category--</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Select Session</label>
                            <div class="col-md-12">
                                <select class=" form-control select2 rounded-2" name="session_id">
                                    <option disabled selected >--Select Category--</option>
                                    @foreach ($sessions as $session)
                                        <option value="{{ $session->id }}">{{ $session->session }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Student Id</label>
                            <input type="text" class="form-control" rows="5" name="student_id" placeholder="Student Id">
                        </div>
                        <div class="form-group">
                            <label>Result Image/File</label>
                            <input type="file" name="file" class="form-control">
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
                        <th>Image/File</th>
                        <th>Course Name</th>
                        <th>Session</th>
                        <th>Student Id</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td>
                                @if (Str::endsWith($result->file, ['.pdf', '.doc', '.docx']))
                                <a href="{{ asset($result->file) }}" target="_blank">View Document</a>
                                @else
                                <img src="{{ asset($result->file) }}" style="height: 100px">
                                @endif
                        </td>
                            <td>{{ $result->subCategory->name ?? null }}</td>
                           <td>{{ $result->session }}</td>
                           <td>{{ $result->student_id }}</td>
                            <td>
                                @if ($result->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($result->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td >
                                <a href="{{ route('result.edit',$result->id) }}" class="btn btn-primary btn-sm editProduct">Edit</a>
                                
                        <form action="{{ route('result.destroy',$result->id) }}" class="pt-1" id="deteleCategory" method="POST">
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
