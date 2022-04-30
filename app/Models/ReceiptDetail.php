<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'receipt_id', 'product_id', 'name', 'price', 'quantity'
    ];
}
