<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;

class Device extends Model
{
    protected $fillable = ['customer_id', 'user_id', 'description', 'status', 'entry_date'];

//    protected $dates = [
//        'entry_date',
//        'departure_date'
//    ];

    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function maintenances(){
        return $this->belongsToMany('App\Models\Maintenance')->withTimestamps();
    }

    public function getEntryDateAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getDepartureDateAttribute($value){
        if( is_null($value) ){
            return '';
        }
        return Carbon::parse($value)->format('d/m/Y');
    }

    public static function devicesFilter($status, $entry_date_from, $entry_date_to){
        return Device::status($status)->entryDate($entry_date_from, $entry_date_to)->paginate(10);
    }

    public function scopeStatus($query, $status){
        if( !is_null($status) ){
            return $query->where('status',$status);
        }
        return NULL;
    }

    public function scopeEntryDate($query, $entry_date_from, $entry_date_to){
        if( !is_null($entry_date_from) && !is_null($entry_date_to) ){
            return $query->whereBetween( 'entry_date', [$entry_date_from, $entry_date_to] );
        }else if( !is_null($entry_date_from) && is_null($entry_date_to) ){
            return $query->where( 'entry_date', '>=', $entry_date_from );
        }else if( is_null($entry_date_from) && !is_null($entry_date_to) ){
            return $query->where( 'entry_date', '<=', $entry_date_to );
        }
        return NULL;
    }

}
