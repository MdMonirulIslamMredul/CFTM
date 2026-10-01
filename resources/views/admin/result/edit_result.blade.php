@extends('admin.master')
@section('title')
    Result Edit
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('result.update',$result->id)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('put')
                        <h3>Result page information</h3>
                        <div class="form-group">
                            <label >Select Subject Name</label>
                            <div class="col-md-12">
                                <select class=" form-control select2 rounded-2" name="course_id">
                                    <option disabled selected >--Select Category--</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}" {{ $result->course_id == $subCategory->id ? 'selected':'' }}>{{ $subCategory->name }}</option>
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
                                        <option value="{{ $session->id }}" {{ $result->session_id == $session->id ? 'selected':'' }}>{{ $session->session }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Student Id</label>
                            <input type="text" class="form-control" rows="5" name="student_id" value="{{ $result->student_id }}" placeholder="Student Id">
                        </div>
                        <div class="form-group">
                            <label>Result Image/File</label>
                            <input type="file" name="file" class="form-control">
                            @if (Str::endsWith($result->file, ['.pdf', '.doc', '.docx']))
                                <a href="{{ asset($result->file) }}" target="_blank">View Document</a>
                                @else
                                <img src="{{ asset($result->file) }}" style="height: 100px">
                                @endif
                        </div>
                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($result->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($result->status == 0) selected @endif>Deactive</option>
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
