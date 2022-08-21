<?php

namespace App\Services;

Class Status
{
    public function get()
    {
        $data = Array(
            'Recibido' => 'Recibido',
            'Procesando' => 'Procesando',
            'Terminado' => 'Terminado',
            'Entregado' => 'Entregado'
        );

        return $data;
    }
}
