<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use Illuminate\Http\Request;
use App\Http\Requests\VariationRequest;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variations = Variation::paginate(20);
        return view('admin.variations.index',compact('variations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.variations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VariationRequest $request)
    {
        $data = $request->all();
        $variation = Variation::create(['name'=>$data['name']]);
        if($variation && $request->has('options')){
            foreach($data['options'] as $option){
                $variation->options()->create(['name'=>$option]);
            }
        }
        return redirect()->route('variations.index')->with('success', 'The transaction was done successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function show(Variation $variation)
    {
        return view('admin.variations.show',compact('variation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function edit(Variation $variation)
    {
        return view('admin.variations.edit',compact('variation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function update(VariationRequest $request, Variation $variation)
    {
        $data = $request->all();
        $variation->update(['name'=>$data['name']]);
        if($variation && $request->has('options')){
            foreach($data['options'] as $option){
                $variation->options()->updateOrCreate(['name'=>$option]);
            }
        }
        return redirect()->route('variations.index')->with('success', 'The transaction was done successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variation $variation)
    {
        $variation->delete();
        return redirect()->route('variations.index')->with('success', 'The transaction was done successfully');
    }
}
