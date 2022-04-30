@extends('layout.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-left mb-3">
                            <img src="assets/images/logo-light.png" alt="" height="18">
                        </div>
                        <div class="float-right">
                            <h4 class="m-0 d-print-none">Hóa đơn</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="float-left mt-3">
                                <p><b>Xin chào {{$receipt->name}}</b></p>
                                <p class="text-muted font-13">Vui lòng kiểm tra thông tin dưới đây, nếu có sai sót, vui lòng liên hệ chúng tôi sớm nhất có thể</p>
                            </div>

                        </div>
                        <div class="col-sm-4 offset-sm-2">
                            <div class="mt-3 float-sm-right">
                                <p class="font-13"><strong>Ngày đặt: </strong> &nbsp;&nbsp;&nbsp; {{$receipt->created_at}}</p>
                                <p class="font-13"><strong>Trạng thái: </strong> <span class="float-right">{{$receipt->stringStatus}}</span></p>
                                <p class="font-13"><strong>Mã đơn hàng: </strong> <span class="float-right">{{$receipt->id}}</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-4">
                            <h6>Thông tin người nhận hàng</h6>
                            <address>
                                {{$receipt->name}}<br>
                                {{$receipt->address}}<br>
                                {{$receipt->mail}}<br>
                                <abbr title="Phone">P:</abbr> {{$receipt->phone}}
                            </address>
                        </div>

                        <div class="col-sm-4">
                            <h6>Thông tin người đặt hàng</h6>
                            <address>
                                {{$receipt->name}}<br>
                                {{$receipt->address}}<br>
                                {{$receipt->mail}}<br>
                                <abbr title="Phone">P:</abbr> {{$receipt->phone}}
                            </address>
                        </div>

                        <div class="col-sm-4">
                            <div class="text-sm-right">
                                <img src="assets/images/barcode.png" alt="barcode-image" class="img-fluid mr-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-4">
                                    <thead>
                                        <tr><th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th class="text-right">Tổng</th>
                                        </tr></thead>
                                        <tbody>
                                            @foreach($receipt_details as $receipt_detail)
                                            <tr>
                                                <td>{{$receipt_detail->product_id}}</td>
                                                <td>
                                                    {{$receipt_detail->name}}
                                                </td>
                                                <td>{{$receipt_detail->quantity}}</td>
                                                <td>{{$receipt_detail->price}}</td>
                                                <td class="text-right">{{$receipt_detail->quantity * $receipt_detail->price}}</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="clearfix pt-3">
                                    <h6 class="text-muted">Chú ý</h6>
                                    <small>
                                        Lời dặn dò khi đặt hàng gì đó
                                    </small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right mt-3 mt-sm-0">
                                    <p><b>Tổng tiền:</b> <span class="float-right">{{calculateMoney($receipt_details)}}</span></p>
                                    <p><b>Tiền ship:</b> <span class="float-right">515.00</span></p>
                                    <h3>{{calculateMoney($receipt_details)}}</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="d-print-none mt-4">
                            <div class="text-right">
                                <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i> In</a>
{{--                                <a href="javascript: void(0);" class="btn btn-info">Submit</a>--}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

<?php
function calculateMoney($receipt_details): string
{
    $total = 0;
    foreach ($receipt_details as $receipt_detail) {
        $each = $receipt_detail['price'] * $receipt_detail['quantity'];
        $total += $each;
    }
    return $total;
}
?>