@extends('admin.master')
@section('title')
    user
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
                        <th>Image</th>
                        <th>Email</th>
                        {{-- <th>Designation</th> --}}
                        {{-- <th>Active/Deactive</th> --}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name ?? null }}</td>
                            <td><img src="{{ asset($user->image) }}" style="height: 100px"></td>
                            <td>{{ $user->email ?? null }}</td>

                            {{-- <td>
                                @if ($user->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($user->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td> --}}
                            <td><a href="#" class="btn btn-primary btn-sm editProduct">Edit</a></td>
                            

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
