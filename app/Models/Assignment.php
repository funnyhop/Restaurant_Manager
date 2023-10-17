<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $table='assignments';
    protected $primaryKey = ['staff_id','dinnertb_id','day_id'];
    protected $fillable = ['staff_id', 'dinnertb_id', 'day_id'];
    protected $keyType ='array';
}
