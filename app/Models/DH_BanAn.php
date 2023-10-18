<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DH_BanAn extends Model
{
    use HasFactory;
    protected $table='dh_banans';
    protected $primaryKey = ['order_id','dinnertb_id'];
    protected $fillable = ['order_id', 'dinnertb_id'];
    protected $keyType ='array';

    public function dh_banans(){
        $dh_banans = DB::table('dh_banans')
            ->select('order_id', 'dinnertb_id')->get();
        return $dh_banans;
    }
    public function scopeSearch($query, $key) {
        // $key = request()->key; // Retrieve the key from the request;
        if ($key = request()->key) {
            return $query->where('dinnertb_id', 'like', '%' . $key . '%')
                ->orWhere('order_id', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
