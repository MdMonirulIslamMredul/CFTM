@extends('admin.master')
@section('title')
    Service Edit
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
                    <form action="{{route('facility.update',$facility->id)}}"  method="POST">
                        @csrf
                        @method('put')
                        <h3>Facility page information</h3>
                        <div class="form-group">
                            <label >Facility Name</label>
                            <div class="col-md-4">
                                <input type="text" name="name" value="{{ $facility->name }}" class="form-control" placeholder="Facility Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Facility Description</label>
                           
                            <textarea name="description" class="form-control" cols="10" rows="5" placeholder="Facility Description">{{ $facility->description }}</textarea>
                        </div>
                        
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>               
                 </div>
            </div>
        </div>
    </div>
    
@endsection
