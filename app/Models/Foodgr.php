<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foodgr extends Model
{
    use HasFactory;
    protected $table='foodgrs';
    protected $primaryKey = 'NhomID';
    protected $fillable = ['NhomID', 'TenNhom'];
    protected $keyType = 'string';
}
