@extends('admin.layouts.app')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Products</h1>

</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
            </div>
            <form method="post" action="{{route('products.update',$product->id)}}">
                <div class="card-body">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Product name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product name"
                            value={{$product->name}}>
                    </div>
                    <div class="form-group">
                        <label for="name">Product Description</label>
                        <textarea class="form-control" name="description" id="" cols="30"
                            rows="2">{{$product->description}}</textarea>

                    </div>
                    <hr>

                    <h4>variations</h4>
                    <div class="items">
                        @if(! empty($product->variations))
                        @foreach($product->variations as $item)

                        <div class="row">
                            <div class="col">
                                <label> Variations</label>
                                <select class="form-control" name="variations[]" id="variation-0">

                                    <option>Choose</option>
                                    @foreach($variations as $variation)
                                    <option @if($product->variations->contains('id',$variation->id)) selected @endif
                                        value="{{$variation->id}}">{{$variation->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label> Options</label>
                                <select class="form-control" name="options[]" id="option-0">

                                    <option>Choose</option>
                                    @foreach($item->options as $option)
                                    <option @if($item->pivot->option_id == $option->id) selected @endif
                                        value="{{$option->id}}">{{$option->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label> price</label>
                                <input type="text" name="prices[]" class="form-control" value="{{$item->pivot->price}}"
                                    placeholder="price">
                            </div>
                            <div class="col">
                                <label> quantity</label>
                                <input type="text" name="quantities[]" class="form-control"
                                    value="{{$item->pivot->quantity}}" placeholder="quantity">
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <button id="button-repeat">Add</button>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Save</span>
                    </button>
                </div>


            </form>

        </div>

    </div>
</div>



@endsection

@push('js')
<script>
$variations = @json($variations);
var number = 0;

$('#button-repeat').on('click', function(e) {
    e.preventDefault();

    number++;
    const content = `<div class="row">
                            <div class="col">
                                <label> Variations</label>
                                <select class="form-control" name="variations[]" id="variation-${number}">

                                    <option>Choose</option>
                                    @foreach($variations as $variation)
                                    <option value="{{$variation->id}}">{{$variation->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label> Options</label>
                                <select class="form-control" name="options[]" id="option-${number}">

                                    <option>Choose</option>

                                </select>
                            </div>

                            <div class="col">
                                <label> price</label>
                                <input type="text" name="prices[]" class="form-control" placeholder="price">
                            </div>
                            <div class="col">
                                <label> qty</label>
                                <input type="text" name="quantities[]" class="form-control" placeholder="qty">
                            </div>

                            <div class="col">
                            <label> </label>
                            <button class="btn btn-outline-danger text-nowrap px-1 waves-effect delete-repeat" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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

    $(this).closest(".row").remove();
    number--;
});
$(`#variation-${number}`).on('change', function(e) {

    let selected = $(this).val();

    const map1 = $variations.filter(function(item) {

        if (item.id == selected) {

            return item
        }
    });
    for (let i = 0; i < map1[0].options.length; i++) {
        $(`#option-${number}`).append('<option value=' + map1[0].options[i].id + '>' + map1[0]
            .options[i].name +
            '</option>');
    }

});
</script>
@endpush
