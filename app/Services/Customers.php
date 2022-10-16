<?php

namespace App\Services;

use App\Models\Customer;

Class Customers
{
    public function get()
    {
        $customers = Customer::all();

        $data = Array();

        foreach ($customers as $customer){
            $data[$customer->id] = $customer->name;
        }

        return $data;
    }

    public function getCustomersFromDevice($tech)
    {

        $data = array();
        $ids = array();

        foreach ($tech->devices as $device){

            if( !in_array($device->customer->id, $ids) ){
                $data[] = $device->customer()->first();
                $ids[] = $device->customer->id;
            }

        }

        return $data;

    }

}
