<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table='bills';
    protected $primaryKey = 'HDID';
    protected $fillable = ['staff_id', 'HDID', 'PhuThu', 'TongTien', 'order_id', 'created_at'];
    protected $keyType = 'string';
}
