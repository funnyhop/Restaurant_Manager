<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GhiDH extends Model
{
    use HasFactory;
    protected $table='ghidhs';
    protected $primaryKey = ['order_id','dish_id'];
    protected $fillable = ['order_id', 'dish_id', 'SoLuong'];
    protected $keyType ='array';
}
