@extends('admin.layouts.app')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Products</h1>

</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Show Product</h6>
            </div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Product name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product name"
                            value={{$product->name}} readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Product Description</label>
                        <textarea class="form-control" name="description" id="" cols="30" readonly
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
                                <select class="form-control" name="variations[]" id="variation-0" disabled>


                                    @foreach($variations as $variation)
                                    <option @if($product->variations->contains('id',$variation->id)) selected @endif
                                        value="{{$variation->id}}">{{$variation->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label> Options</label>
                                <select class="form-control" name="options[]" id="option-0" disabled>

                                    @foreach($item->options as $option)
                                    <option @if($item->pivot->option_id == $option->id) selected @endif
                                        value="{{$option->id}}">{{$option->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label> price</label>
                                <input type="text" name="prices[]" class="form-control" value="{{$item->pivot->price}}"
                                    placeholder="price" readonly>
                            </div>
                            <div class="col">
                                <label> quantity</label>
                                <input type="text" name="quantities[]" class="form-control"
                                    value="{{$item->pivot->quantity}}" placeholder="quantity" readonly>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>

                </div>



        </div>

    </div>
</div>



@endsection



