<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $primaryKey = 'DonID';
    protected $fillable = ['DonID', 'SoKhach', 'TrangThai','customer_id','created_at'];
    protected $keyType = 'string';
}
