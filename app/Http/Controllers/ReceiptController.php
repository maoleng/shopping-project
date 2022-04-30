<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Http\Requests\StoreReceiptRequest;
use App\Http\Requests\UpdateReceiptRequest;
use App\Models\ReceiptDetail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $receipts = [];
        $status = $request->status;
        if (empty($status)) {
            $receipts = Receipt::all();

        }
        switch ($status) {
            case '0':
                $receipts = Receipt::query()->where('status', '0')->get();
                break;
            case '1':
                $receipts = Receipt::query()->where('status', '1')->get();
                break;
            case '2':
                $receipts = Receipt::query()->where('status', '2')->get();
                break;
            case '3':
                $receipts = Receipt::query()->where('status', '3')->get();
                break;
        }

        return view('receipt.index', [
            'receipts' => $receipts,
        ]);
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
     * @param  \App\Http\Requests\StoreReceiptRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReceiptRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return Application|Factory|View
     */
    public function show(Receipt $receipt): View|Factory|Application
    {
        $receipt_details = ReceiptDetail::query()->where('receipt_id', $receipt->id)->get();
        return view('receipt.cart_detail', [
            'receipt' => $receipt,
            'receipt_details' => $receipt_details
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReceiptRequest  $request
     * @param  \App\Models\Receipt  $receipt
     * @return RedirectResponse
     */
    public function update(Request $request, Receipt $receipt): RedirectResponse
    {
        $status = $request->status;
        Receipt::query()->where('id', $receipt->id)->update(['status' => $status]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        //
    }
}
