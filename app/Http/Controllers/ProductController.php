<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variation;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\DataTables\ProductDataTable;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(20);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variations = Variation::with('options')->get();
        return view('admin.products.create',compact('variations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create(["name"=>$request->name,"description"=>$request->description]);
        $product->variations()->sync(($this->customSync($request->all(),$product->id)));

        return redirect()->route('products.index')->with('success', 'The transaction was done successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        $variations = Variation::with('options')->get();
        return view('admin.products.show',compact('product','variations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $variations = Variation::with('options')->get();
        return view('admin.products.edit',compact('product','variations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update(["name"=>$request->name]);
        $product->variations()->sync(($this->customSync($request->all(),$product->id)));
        return redirect()->route('products.index')->with('success', 'The transaction was done successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'The transaction was done successfully');
    }

    private function customSync($data,$product_id)
    {
        $newData = [];
        foreach($data['variations'] as $key => $item){
            $row=[];
            $row['variation_id']=$item;
            $row['option_id']=$data['options'][$key];
            $row['price']=$data['prices'][$key];
            $row['quantity']=$data['quantities'][$key];
            $newData[$product_id]=$row;

        }
        return $newData;
    }
}
