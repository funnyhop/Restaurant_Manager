<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GhiDH extends Model
{
    use HasFactory;
    protected $table='ghidhs';
    protected $primaryKey = ['order_id','dish_id'];
    protected $fillable = ['order_id', 'dish_id', 'SoLuong'];
    protected $keyType ='array';

    public function ghidhs(){
        $ghidhs = DB::table('ghidhs')
            ->select('order_id', 'dish_id', 'SoLuong')->get();
        return $ghidhs;
    }
    public function scopeSearch($query, $key) {
        // $key = request()->key; // Retrieve the key from the request;
        if ($key = request()->key) {
            return $query->where('order_id', 'like', '%' . $key . '%')
                ->orWhere('dish_id', 'like', '%' . $key . '%')
                ->orWhere('SoLuong', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
