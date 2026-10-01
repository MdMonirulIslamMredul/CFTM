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
               
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>

                        <th>Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Service Name</th>
                        <th>Doctor Assign</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($infos as $info)
                        <tr>
                            <td>{{ $info->name ?? null }}</td>
                            <td>{{ $info->number ?? null }}</td>
                            <td>{{ $info->email ?? null }}</td>
                            <td>{{ $info->service->name ?? null }}</td>

                            <td>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label class="">Assign a doctor</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="category_id">
                                                <option disabled selected >--Select --</option>
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                                 @endforeach
                                            </select>
                                            <button type="submit" value="submit"> Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td>
                                {{-- <a href="#" class="btn btn-info mt-3">Submit</a> --}}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    
@endsection
