@extends('layouts.backend')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"><b>Edit Set</b></h3>
            </div>
            <div class="block-content block-content-full">'
                <form action="{{ route('set.update') }}" method="post" enctype="multipart/form-data"  novalidate>
                    @csrf
                    <input type="hidden" name="id" value="{{$set->id}}">
                    <div class="col-lg-12 col-xl-6">
                        <div class="form-group">
                            <label for="example-text-input">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Enter name" value="{{isset($set->name) ? $set['name'] : ""}}">
                        </div>
                        <div class="form-group">
                            <label for="example-email-input">Image</label>
                            <input type="file" class="form-control" id="image" name="image"
                                   placeholder="Choose an image">
                        </div>

                    </div>
                    <div class="text-right">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
@endsection
