<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    use HasFactory;
    protected $table='assignments';
    protected $primaryKey = ['staff_id','dinnertb_id','day_id'];
    protected $fillable = ['staff_id', 'dinnertb_id', 'day_id'];
    protected $keyType ='array';

    public function assignments(){
        $assignments = DB::table('signups')
            ->select('staff_id','dinnertb_id','day_id')->get();
        return $assignments;
    }
    public function scopeSearch($query, $key) {
        // $key = request()->key; // Retrieve the key from the request;
        if ($key = request()->key) {
            return $query->where('day_id', 'like', '%' . $key . '%')
                ->orWhere('staff_id', 'like', '%' . $key . '%')
                ->orWhere('dinnertb_id', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
