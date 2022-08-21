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
}
