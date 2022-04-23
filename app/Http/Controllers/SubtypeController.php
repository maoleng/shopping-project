<?php

namespace App\Http\Controllers;

use App\Models\Subtype;
use App\Http\Requests\StoreSubtypeRequest;
use App\Http\Requests\UpdateSubtypeRequest;

class SubtypeController extends Controller
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
     * @param  \App\Http\Requests\StoreSubtypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubtypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subtype  $subtype
     * @return \Illuminate\Http\Response
     */
    public function show(Subtype $subtype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subtype  $subtype
     * @return \Illuminate\Http\Response
     */
    public function edit(Subtype $subtype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubtypeRequest  $request
     * @param  \App\Models\Subtype  $subtype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubtypeRequest $request, Subtype $subtype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subtype  $subtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subtype $subtype)
    {
        //
    }
}
