<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foodgr extends Model
{
    use HasFactory;
    protected $table='foodgrs';
    protected $primaryKey = 'NhomID';
    protected $fillable = ['NhomID', 'TenNhom'];
    protected $keyType = 'string';

    public function foodgrs(){
        $foodgrs = DB::table('foodgrs')->select('NhomID', 'TenNhom')->get();
        return $foodgrs;
    }

    public function scopeSearch($query, $key) {
        // $key = request()->key; // Retrieve the key from the request;
        if ($key = request()->key) {
            return $query->where('NhomID', 'like', '%' . $key . '%')
                ->orWhere('TenNhom', 'like', '%' . $key . '%');
        }
        return $query;
    }
}


