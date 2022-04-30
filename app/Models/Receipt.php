<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'phone', 'mail', 'note', 'total'
    ];

    public function getStringStatusHTMLAttribute()
    {
        switch ($this->status) {
            case '0':
                return '<span class="badge badge-warning-lighten">Chưa xử lý</a>';
            case '1':
                return '<span class="badge badge-warning-lighten">Đang giao hàng</a>';
            case '2':
                return '<span class="badge badge-info-lighten">Giao thành công</a>';
            case '3':
                return '<span class="badge badge-danger-lighten">Đã hủy</a>';
        }
    }

    public function getStringStatusAttribute()
    {
        switch ($this->status) {
            case '0':
                return 'Chưa xử lý';
            case '1':
                return 'Đang giao hàng';
            case '2':
                return 'Giao thành công';
            case '3':
                return 'Đã hủy';
        }
    }

    public function getTotalAttribute(): float|int
    {
        $receipt_id = $this->id;
        $receipt_details = ReceiptDetail::query()->where('receipt_id', $receipt_id)->select('price', 'quantity')->get();
        $total = 0;
        foreach ($receipt_details as $receipt_detail) {
            $total += $receipt_detail['quantity'] * $receipt_detail['price'];
        }
        return $total;
    }







}
