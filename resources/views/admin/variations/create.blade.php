@extends('admin.layouts.app')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">variations</h1>

</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New variations</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('variations.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">variation name</label>
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="Enter variation name">
                    </div>
                    <hr>

                    <h4>Options</h4>
                    <div class="items">

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-option">
                                    Name
                                </label>


                                <input type="text" name="options[]" class="form-control"
                                    placeholder="Enter option name">

                            </div>
                        </div>

                        <button class="btn btn-primary btn-icon-split" id="button-repeat"> <span
                                class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span></button>
                    </div>
                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Save</span>
                    </button>



                </form>
            </div>
        </div>

    </div>
</div>


@endsection
@push('js')
<script>
$('#button-repeat').on('click', function(e) {
    e.preventDefault();

    let counter = 1;
    const content = `<div class="row d-flex align-items-end item">

            <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-option">
              Name
            </label>
            <input type="text" name="options[]" class="form-control" placeholder="Enter option name">

          </div>
        </div>


                <div class="col-md-2 col-12 mb-50">
                    <div class="mb-1">
                        <button
                            class="btn btn-outline-danger text-nowrap px-1 waves-effect delete-repeat"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-x me-25">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>`;
    $('.items').append(content);
});
$(document).on('click', '.delete-repeat', function() {

    $(this).closest(".item").remove();
});
</script>
@endpush
