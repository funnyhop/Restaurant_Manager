<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
    use HasFactory;
    protected $table='bills';
    protected $primaryKey = 'HDID';
    protected $fillable = ['staff_id', 'HDID', 'PhuThu', 'TongTien', 'order_id', 'created_at'];
    protected $keyType = 'string';

    public function bills(){
        $bills = DB::table('bills')->select('staff_id', 'HDID', 'PhuThu', 'TongTien', 'order_id', 'created_at')->get();
        return $bills;
    }
    public function scopeSearch($query, $key){
        if($key) {
            return $query->where('HDID','like','%'.$key.'%')
                ->orWhere('HDID','like','%'.$key.'%')
                ->orWhere('order_id','like','%'.$key.'%')
                ->orWhere('created_at','like','%'.$key.'%');
        }
    }


}
