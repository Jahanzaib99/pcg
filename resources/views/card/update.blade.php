@extends('layouts.backend')
@section('content')

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"><b>Edit Card</b></h3>
            </div>
            <div class="block-content block-content-full">'
                <form action="{{ route('card.update') }}" method="post" enctype="multipart/form-data"  novalidate>
                    @csrf
                    <input type="hidden" name="id" value="{{$card->id}}">
                    <div class="col-lg-12 col-xl-6">
                        <div class="form-group">
                            <label for="example-email-input">Set</label>
                            <select name="set_id" id="set_id" class="form-control">
                                <option disabled> select set</option>
                                @foreach($sets as $set)
                                    <option value="{{ $set->id }}" {{ $card->set_id == $set->id ? 'selected="selected"' : '' }}>{{ $set->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Enter name" value="{{isset($card->name) ? $card['name'] : ""}}">
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
