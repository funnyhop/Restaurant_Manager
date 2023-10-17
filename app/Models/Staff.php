<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table='staffs';
    protected $primaryKey = 'NVID';
    protected $fillable = ['TenNV', 'NVID', 'GT', 'DiaChi', 'SDT', 'NgaySinh', 'MatKhau','ChucVu'];
    protected $keyType = 'string';
}
