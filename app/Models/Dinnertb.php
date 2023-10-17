<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinnertb extends Model
{
    use HasFactory;
    protected $table='dinnertbs';
    protected $primaryKey = 'BanID';
    protected $fillable = ['BanID', 'SoGhe'];
    protected $keyType = 'string';
}
