@extends('admin.master')
@section('title')
    About settings
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
                <div class="card-body ">
                    <form class="form-horizontal" action="{{route('store.about')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @if($about_data!=null)
                        <input type="hidden" value="{{$about_data->id}}" name="id">
                        @endif

                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label>About Title</label>
                            <input type="text" class="form-control" rows="5" name="title" id="title" placeholder="About Title" required>
                        </div>
                        <div class="form-group">
                            <label>About Image One</label>
                            <input type="file" name="image1" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>About Image Two</label>
                            <input type="file" name="image2" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>About Details</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="details1" ></textarea>
                        </div>

                        <div class="form-group">
                            <label>About Details one</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="details2"></textarea>
                        </div>
                        <div class="form-group">
                            <label>About Details two</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="details3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>About Details three</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="details4"></textarea>
                        </div>
                        <h3>Details page information</h3>
                        <div class="form-group">
                            <label>About Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>About page Details</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="page_details" ></textarea>
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
                        <th>Image</th>
                        <th>Title</th>
{{--                        <th>Details</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($abouts as $about)
                        <tr>
                            <td><img src="{{ asset($about->image1) }}" style="height: 100px"></td>
                            <td>{{ $about->title ?? null }}</td>
{{--                            <td>{!! $about->details1 ?? null !!}</td>--}}

                            <td>
                                <a href="{{ route('edit.about',['id'=>$about->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- Affiliations Management Section -->
    <div class="col-lg-12 mt-4">
        <div class="card">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-white"><i class="ti-bookmark-alt"></i> About Page Affiliations & Recognitions</h4>
                <div>
                    <a href="{{ route('objectives.index') }}" class="btn btn-light btn-sm font-weight-bold mr-2">
                        <i class="ti-target"></i> Objectives & Achievements
                    </a>
                    <a href="{{ route('affiliations.index') }}" class="btn btn-light btn-sm font-weight-bold">
                        <i class="ti-plus"></i> Add New Affiliation
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th style="width: 60px;">Order</th>
                                <th style="width: 100px;">Emblem</th>
                                <th>Institution</th>
                                <th>Banner Text</th>
                                <th style="width: 80px;">Style</th>
                                <th style="width: 80px;">Status</th>
                                <th style="width: 150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($affiliations) && count($affiliations) > 0)
                                @foreach ($affiliations as $affil)
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ $affil->order_num }}</td>
                                        <td class="text-center">
                                            @if($affil->image && file_exists(public_path($affil->image)))
                                                <img src="{{ asset($affil->image) }}" alt="Logo" style="max-height: 45px; max-width: 80px; object-fit: contain;">
                                            @else
                                                <span class="badge badge-secondary">No image</span>
                                            @endif
                                        </td>
                                        <td><strong>{{ $affil->institution_name ?? '—' }}</strong></td>
                                        <td>
                                            <div style="{{ $affil->is_italic ? 'font-style: italic;' : '' }}; background: #f0f4f9; padding: 6px 10px; border-radius: 4px; border-left: 3px solid #2b70c9;">
                                                {{ $affil->title }}
                                            </div>
                                        </td>
                                        <td>
                                            @if($affil->is_italic)
                                                <span class="label" style="display: inline-block; padding: 4px 10px; font-weight: 600; font-style: italic; background-color: #7b1fa2; color: #ffffff !important; border-radius: 4px;">Italic</span>
                                            @else
                                                <span class="label" style="display: inline-block; padding: 4px 10px; font-weight: 600; background-color: #e2e8f0; color: #1e293b !important; border: 1px solid #cbd5e1; border-radius: 4px;">Normal</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($affil->status == 1)
                                                <span class="label" style="display: inline-block; padding: 4px 10px; font-weight: 600; background-color: #00c292; color: #ffffff !important; border-radius: 4px;">Active</span>
                                            @else
                                                <span class="label" style="display: inline-block; padding: 4px 10px; font-weight: 600; background-color: #e46a76; color: #ffffff !important; border-radius: 4px;">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('affiliations.edit', $affil->id) }}" class="btn btn-primary btn-sm mr-1">
                                                <i class="ti-pencil"></i> Edit
                                            </a>
                                            <form action="{{ route('affiliations.destroy', $affil->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Are you sure you want to delete this affiliation?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="ti-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-3">No affiliations configured yet.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/assets/node_modules/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        if (typeof tinymce !== 'undefined') {
            tinymce.init({
                selector: 'textarea.editor, textarea#tinymce',
                height: 250,
                menubar: false,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | bold italic underline | ' +
                    'alignleft aligncenter alignright alignjustify | ' +
                    'bullist numlist outdent indent | removeformat | table | code',
                promotion: false,
                branding: false
            });
        }
    </script>
@endsection
