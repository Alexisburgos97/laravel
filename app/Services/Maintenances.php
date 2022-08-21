<?php

namespace App\Services;

use App\Models\Maintenance;

Class Maintenances
{
    public function get()
    {
        $maintenances = Maintenance::all();

        $data = Array();

        foreach ($maintenances as $maintenance){
            $data[$maintenance->id] = $maintenance->name;
        }

        return $data;
    }
}
