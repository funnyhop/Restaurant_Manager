<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shift extends Model
{
    use HasFactory;
    protected $table='shifts';
    protected $primaryKey = 'CaID';
    protected $fillable = ['CaID', 'ShiftStart', 'ShiftEnd','Luong'];
    protected $keyType = 'string';

    public function shifts(){
        $shifts = DB::table('shifts')->select('CaID', 'ShiftStart', 'ShiftEnd','Luong')->get();
        return $shifts;
    }
    public function scopeSearch($query, $key){
        if($key = request()->key){
            return $query->where('CaID', 'like', '%' . $key . '%')
                        ->orWhere('ShiftStart', 'like', '%'. $key . '%')
                        ->orWhere('ShiftEnd', 'like', '%' . $key . '%')
                        ->orWhere('Luong', 'like', '%' . $key . '%');
        }
    }

}
