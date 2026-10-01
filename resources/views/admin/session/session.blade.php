@extends('admin.master')
@section('title')
    Package
@endsection
@section('body')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card mt-2">

                @if(Session::get('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>
                @endif
                <div class="card-body mt-2">
                    <form class="form-horizontal" action="{{route('store.session')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <h3>Front Page Information</h3>
                        <div class="form-group">
                            <label>Session</label>
                            <input type="text" class="form-control" rows="5" name="session" placeholder="Enter Session">
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
                        <th>Session</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sessions as $session)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $session->session ?? null }}</td>
                            <td>
                                @if ($session->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($session->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('edit.session',['id'=>$session->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>
                                <form action="{{ route('delete.session',$session->id) }}" class="pt-2" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure to Delete?')"> Delete</button>
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
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $("#addFeaturesRow").on("click",function(){
                    var new_row=$("#hidden-location-box").html();
                    $("#nearest-place-box").append(new_row)

                })
                $(document).on('click', '.removeNearestPlaceRow', function() {
                    $(this).closest('.delete-dynamic-location').remove();
                });
                //end dynamic nearest place add and remove



            });

        })(jQuery);

    </script>
@endsection
