<?php

namespace App\Http\Controllers;

use App\Models\SpecificationProduct;
use App\Http\Requests\StoreSpecificationProductRequest;
use App\Http\Requests\UpdateSpecificationProductRequest;

class SpecificationProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpecificationProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecificationProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpecificationProduct  $specificationProduct
     * @return \Illuminate\Http\Response
     */
    public function show(SpecificationProduct $specificationProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpecificationProduct  $specificationProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SpecificationProduct $specificationProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpecificationProductRequest  $request
     * @param  \App\Models\SpecificationProduct  $specificationProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecificationProductRequest $request, SpecificationProduct $specificationProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpecificationProduct  $specificationProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpecificationProduct $specificationProduct)
    {
        //
    }
}
