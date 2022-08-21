<?php

namespace App\Services;

use App\Models\User;

Class Technicians
{
    public function get()
    {
        $technicians = User::where('id','!=',1)->get(); // 1 ADMIN

        $data = Array();

        foreach ($technicians as $technician){
            $data[$technician->id] = $technician->name;
        }

        return $data;
    }
}
