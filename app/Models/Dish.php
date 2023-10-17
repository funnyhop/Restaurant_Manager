<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dish extends Model
{
    use HasFactory;
    protected $table='dishes';
    protected $primaryKey = 'MonID';
    protected $fillable = ['MonID', 'TenMon', 'DVT', 'foodgr_id'];
    protected $keyType = 'string';

    public function dishes(){
        $dish = DB::table('dishes')->select('MonID', 'TenMon', 'DVT', 'foodgr_id')->get();
        return $dish;
    }
}
