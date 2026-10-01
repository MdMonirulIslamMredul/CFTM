@extends('admin.master')
@section('title')
    Facility
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('facility.store')}}"  method="POST">
                        @csrf
                        <h3>Facility page information</h3>
                        <div class="form-group">
                            <label >Facility Name</label>
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control" placeholder="Facility Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Facility Description</label>
                           
                            <textarea name="description" class="form-control" cols="10" rows="5" placeholder="Facility Description"></textarea>
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
                        
                        <th>Name</th>
                        <th>Description</th>
                        
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($facilities as $facility)
                        <tr>
                            
                            <td>{{ $facility->name ?? null }}</td>
                           <td>{{ $facility->description }}</td>
                           
                            <td >
                                <a href="{{ route('facility.edit',$facility->id) }}" class="btn btn-primary btn-sm editProduct">Edit</a>
                                
                        <form action="{{ route('facility.destroy',$facility->id) }}" class="pt-1" id="deteleCategory" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm editProduct "> Delete</button>
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
