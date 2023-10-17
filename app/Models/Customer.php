<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table='customers';
    protected $primaryKey = 'KHID';
    protected $fillable = ['TenKH', 'KHID', 'GT', 'DiaChi', 'SDT'];
    protected $keyType = 'string';
}
