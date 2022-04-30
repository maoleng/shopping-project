<?php

namespace App\Http\Controllers;

use App\Models\ReceiptDetail;
use App\Http\Requests\StoreReceiptDetailRequest;
use App\Http\Requests\UpdateReceiptDetailRequest;

class ReceiptDetailController extends Controller
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
     * @param  \App\Http\Requests\StoreReceiptDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReceiptDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceiptDetail  $receiptDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiptDetail $receiptDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiptDetail  $receiptDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceiptDetail $receiptDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReceiptDetailRequest  $request
     * @param  \App\Models\ReceiptDetail  $receiptDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReceiptDetailRequest $request, ReceiptDetail $receiptDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReceiptDetail  $receiptDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceiptDetail $receiptDetail)
    {
        //
    }
}
