<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $table='customers';
    protected $primaryKey = 'KHID';
    protected $fillable = ['TenKH', 'KHID', 'GT', 'DiaChi', 'SDT'];
    protected $keyType = 'string';

    public function customers(){
        $customers = DB::table('customers')->select('TenKH', 'KHID', 'GT', 'DiaChi', 'SDT')->get();
        return $customers;
    }
    public function scopeSearch($query, $key){
        if ($key = request()->key) {
            return $query->where('TenKH', 'like', '%' . $key . '%')
                ->orWhere('KHID', 'like', '%' . $key . '%')
                ->orWhere('DiaChi', 'like', '%' . $key . '%')
                ->orWhere('GT', 'like', '%' . $key . '%')
                ->orWhere('SDT', 'like', '%' . $key . '%');
        }
    }
}
