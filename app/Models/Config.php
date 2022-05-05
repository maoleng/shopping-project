<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'value'
    ];

    public function getBeautyContentAttribute()
    {
        switch ($this->content) {
            case 'about_us':
                return 'Lời giới thiệu về cửa hàng';
            case 'company_name':
                return 'Tên cửa hàng';
            case 'company_address':
                return 'Địa chỉ cửa hàng';
            case 'company_mail':
                return 'Địa chỉ email cửa hàng';
            case 'company_phone1':
                return 'Số điện thoại 1';
            case 'company_phone2':
                return 'Số điện thoại 2';
            case 'facebook':
                return 'Đường dẫn đến trang facebook';
            case 'order_note':
                return 'Lời lưu ý khi khách đặt hàng';
            case 'youtube':
                return 'Đường dẫn đến trang youtube';
        }
    }


}
