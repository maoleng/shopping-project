@extends('layout.master')
@section('content')

    <table class="table table-striped table-centered mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Tên người nhận</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Thời gian đặt</th>
            <th>Lần cuối điều chỉnh</th>
            <th>Xem chi tiết</th>
            <th>Duyệt</th>
        </tr>
        </thead>
        <tbody>
        @foreach($receipts as $receipt)

            <tr>
                <td class="table-user">
                    {{$receipt->id}}
                </td>
                <td>{{$receipt->name}}</td>
                <td>
                <h3>{!! $receipt->stringStatusHTML !!}</h3>
                </td>
                <td>{{$receipt->total}}</td>
                <td>{{$receipt->created_at}}</td>
                <td>{{$receipt->updated_at}}</td>
                <td class="table-action">
                    <a href="{{route('receipts.show', ['receipt' => $receipt->id])}}" class="action-icon">
                        <i class="mdi mdi-eye"></i>
                    </a>
                </td>

                <td class="table-action">
                    @if ($receipt->status === 0)
                        <form action="{{route('receipts.update', ['receipt' => $receipt->id, 'status' => 1])}}" method="post">
                            @method('PUT')
                            @csrf
                            <button class="action-icon btn">
                                <i class="mdi dripicons-checkmark">Chuyển sang đang giao</i>
                            </button>
                        </form>

                        <form action="{{route('receipts.update', ['receipt' => $receipt->id, 'status' => 3])}}" method="post">
                            @method('PUT')
                            @csrf
                            <button class="action-icon btn">
                                <i class="mdi dripicons-cross">Hủy đơn</i>
                            </button>
                        </form>
                    @elseif ($receipt->status === 1)
                        <form action="{{route('receipts.update', ['receipt' => $receipt->id, 'status' => 2])}}" method="post">
                            @method('PUT')
                            @csrf
                            <button class="action-icon btn">
                                <i class="mdi dripicons-checkmark">Chuyển sang giao thành công</i>
                            </button>
                        </form>

                        <form action="{{route('receipts.update', ['receipt' => $receipt->id, 'status' => 3])}}" method="post">
                            @method('PUT')
                            @csrf
                            <button class="action-icon btn">
                                <i class="mdi dripicons-cross">Hủy đơn</i>
                            </button>
                        </form>
                    @else
                        <form action="{{route('receipts.update', ['receipt' => $receipt->id, 'status' => 0])}}" method="post">
                            @method('PUT')
                            @csrf
                            <button class="action-icon btn">
                                <i class="uil-redo">Sửa chữa lỗi lầm</i>
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
