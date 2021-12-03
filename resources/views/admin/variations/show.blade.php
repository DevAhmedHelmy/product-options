@extends('admin.layouts.app')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">variations</h1>

</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Show variations</h6>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="name">variation name</label>
                    <input type="text" value={{$variation->name}} name="name" class="form-control" id="name"
                        placeholder="Enter variation name">
                </div>
                <hr>

                <h4>Options</h4>
                <div class="items">
                    @if(!empty($variation->options))
                    @foreach($variation->options as $option)
                    <div class="item">
                        <div class="row">

                            <div class=col-8>

                                <div class="form-group">
                                    <label>
                                        Name
                                    </label>


                                    <input type="text" name="options[]" class="form-control"
                                        placeholder="Enter option name" value="{{$option->name}}" readonly>

                                </div>
                            </div>

                        </div>
                        @endforeach
                        @else

                        <div class="item">

                            <div class="form-group">
                                <label>
                                    Name
                                </label>


                                <input type="text" name="options[]" class="form-control" placeholder="Enter option name"
                                    readonly>

                            </div>
                        </div>
                        @endif
                    </div>







                </div>
            </div>

        </div>
    </div>


    @endsection
