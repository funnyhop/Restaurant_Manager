<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dinnertb extends Model
{
    use HasFactory;
    protected $table='dinnertbs';
    protected $primaryKey = 'BanID';
    protected $fillable = ['BanID', 'SoGhe'];
    protected $keyType = 'string';

    public function dinnertbs(){
        $dinnertbs = DB::table('dinnertbs')->select('BanID', 'SoGhe')->get();
        return $dinnertbs;
    }
    public function scopeSearch($query, $key){
        if($key = request()->key){
            return $query->where('BanID', 'like', '%' . $key . '%')
                        ->orWhere('SoGhe', 'like', '%'. $key . '%');
        }
    }
}
