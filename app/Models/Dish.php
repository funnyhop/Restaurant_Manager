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
    public function scopeSearch($query, $key) {
        // $key = request()->key; // Retrieve the key from the request;
        if ($key = request()->key) {
            return $query->where('MonID', 'like', '%' . $key . '%')
                ->orWhere('TenMon', 'like', '%' . $key . '%')
                ->orWhere('foodgr_id', 'like', '%' . $key . '%')
                ->orWhere('DVT', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
