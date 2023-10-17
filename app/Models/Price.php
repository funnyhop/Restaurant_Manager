<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Price extends Model
{
    use HasFactory;
    protected $table='prices';
    protected $primaryKey = ['day_id','dish_id'];
    protected $fillable = ['day_id', 'dish_id', 'Gia'];
    protected $keyType ='array';

    public function prices(){
        $prices = DB::table('prices')
            ->join('dishes', 'prices.dish_id', '=', 'dishes.MonID')
            ->select('day_id', 'dish_id', 'Gia','dishes.TenMon')->get();
        return $prices;
    }
    public function scopeSearch($query, $key) {
        // $key = request()->key; // Retrieve the key from the request;
        if ($key = request()->key) {
            return $query->where('day_id', 'like', '%' . $key . '%')
                ->orWhere('dish_id', 'like', '%' . $key . '%')
                ->orWhere('Gia', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
