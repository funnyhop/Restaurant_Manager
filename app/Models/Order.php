<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $primaryKey = 'DonID';
    protected $fillable = ['DonID', 'SoKhach', 'TrangThai','customer_id','created_at'];
    protected $keyType = 'string';

    public function orders(){
        $orders = DB::table('orders')->select('DonID', 'SoKhach', 'TrangThai','customer_id','created_at')->get();
        return $orders;
    }
    public function scopeSearch($query, $key){
        if($key = request()->key){
            return $query->where('DonID', 'like', '%' . $key . '%')
                        ->orWhere('TrangThai', 'like', '%'. $key . '%')
                        ->orWhere('customer_id', 'like', '%' . $key . '%')
                        ->orWhere('SoKhach', 'like', '%' . $key . '%')
                        ->orWhere('created_at', 'like', '%' . $key . '%');
        }
    }
}
