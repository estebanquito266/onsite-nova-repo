<?php

namespace App\Imports;

use App\Models\Onsite\LocalidadOnsite;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LocalidadOnsiteImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $col)
    {
        return new LocalidadOnsite([
            
            'id' => $col['id'],
            'company_id' => $col['company_id'],
            'id_provincia' => $col['id_provincia'],            
            'localidad' => $col['localidad'],
            'localidad_estandard' => $col['localidad_estandard'],
            'codigo' => $col['codigo'],
            'km' => $col['km'],
            'id_nivel' => $col['id_nivel'],
            'atiende_desde' => $col['atiende_desde'],
            'id_usuario_tecnico' => $col['id_usuario_tecnico'],

        ]);
    }


}
