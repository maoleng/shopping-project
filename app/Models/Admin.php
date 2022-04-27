<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'username', 'password', 'level', 'active'
    ];

    public function getIsActiveAttribute(): string
    {
        if ( $this->active === 1 ) {
            return 'Hoạt động';
        }
        return 'Bị khóa';
    }

    public function getStringLevelAttribute (): string
    {
        if ($this->level === 1) {
            return 'Sếp';
        }
        return 'Nhân viên';
    }

}
