<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DH_BanAn extends Model
{
    use HasFactory;
    protected $table='dh_banans';
    protected $primaryKey = ['order_id','dinnertb_id'];
    protected $fillable = ['order_id', 'dinnertb_id'];
    protected $keyType ='array';
}
