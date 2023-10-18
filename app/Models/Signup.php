<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Signup extends Model
{
    use HasFactory;
    protected $table='signups';
    protected $primaryKey = [signups];
    protected $fillable = ['staff_id', 'shift_id', 'day_id'];
    protected $keyType ='array';

    public function signups(){
        $signups = DB::table('signups')
            ->select('staff_id', 'shift_id', 'day_id')->get();
        return $signups;
    }
    public function scopeSearch($query, $key) {
        // $key = request()->key; // Retrieve the key from the request;
        if ($key = request()->key) {
            return $query->where('day_id', 'like', '%' . $key . '%')
                ->orWhere('staff_id', 'like', '%' . $key . '%')
                ->orWhere('shift_id', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
