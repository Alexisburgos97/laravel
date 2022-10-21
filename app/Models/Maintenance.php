<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Maintenance extends Model
{

    use HasFactory;

    protected $fillable = ['name', 'price'];

    public function devices()
    {
        return $this->belongsToMany('App\Models\Device')->withTimestamps();
    }

    public static function maintenancesFilter($maintenance_name)
    {
        return Maintenance::name($maintenance_name)->paginate(10);
    }

    public function scopeName($query, $data)
    {
        if( !empty($data) ){
            return $query->where('name', 'LIKE', "%$data%");
        }
    }

}
