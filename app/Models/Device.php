<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['customer_id', 'user_id', 'description', 'status', 'entry_date'];

    protected $dates = [
        'entry_date',
        'departure_date'
    ];

    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function maintenances(){
        return $this->belongsToMany('App\Models\Maintenance')->withTimestamps();
    }

}
