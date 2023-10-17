<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $table='prices';
    protected $primaryKey = ['day_id','dish_id'];
    protected $fillable = ['day_id', 'dish_id', 'Gia'];
    protected $keyType ='array';
}
