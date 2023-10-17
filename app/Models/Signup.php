<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    use HasFactory;
    protected $table='signups';
    protected $primaryKey = ['staff_id','shift_id', 'day_id'];
    protected $fillable = ['staff_id', 'shift_id', 'day_id'];
    protected $keyType ='array';
}
