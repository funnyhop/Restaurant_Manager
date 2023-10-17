<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $table='shifts';
    protected $primaryKey = 'CaID';
    protected $fillable = ['CaID', 'ShiftStart', 'ShiftEnd','Luong'];
    protected $keyType = 'string';
}
