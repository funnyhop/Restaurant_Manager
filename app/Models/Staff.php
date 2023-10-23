<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;
    protected $table='staffs';
    protected $primaryKey = 'NVID';
    protected $fillable = ['TenNV', 'NVID', 'GT', 'DiaChi', 'SDT', 'NgaySinh', 'email', 'password','ChucVu'];
    protected $keyType = 'string';

    public function staffs(){
        $staffs = DB::table('staffs')->select('TenNV', 'NVID', 'GT', 'DiaChi', 'SDT', 'NgaySinh', 'email', 'password','ChucVu')->get();
        return $staffs;
    }
    public function scopeSearch($query, $key){
        if($key = request()->key){
            return $query->where('NVID', 'like', '%' . $key . '%')
                        ->orWhere('TenNV', 'like', '%'. $key . '%')
                        ->orWhere('SDT', 'like', '%' . $key . '%')
                        ->orWhere('ChucVu', 'like', '%' . $key . '%');
        }
    }
}
