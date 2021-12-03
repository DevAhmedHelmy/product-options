@extends('admin.layouts.app')


@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Products</h1>

</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> </h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>
                                <form id="delete-form-{{ $product->id }}"
                                    action="{{ route('products.destroy', $product->id) }}" method="post">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-clean
                                        btn-icon mr-2" title="@lang('general.show')">
                                        <i class="fa fa-eye"></i>

                                    </a>


                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-clean
                                            btn-icon mr-2" title="@lang('general.edit')">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-sm btn-clean btn-icon"
                                        title="@lang('general.delete')"
                                        onclick="confirmDelete('delete-form-{{ $product->id }}')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div>

            </div>
        </div>

    </div>
</div>



@endsection
