<?php

namespace App\Imports;

use App\Models\Onsite\SucursalOnsite;
use App\Models\Respuestos\ModeloRespuestosOnsite;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SucursalOnsiteImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $col)
    {
        return new SucursalOnsite([
            
            'id' => $col['id'],
            'company_id' => $col['company_id'],
            'codigo_sucursal' => $col['codigo_sucursal'],            
            'razon_social' => $col['razon_social'],
            'empresa_onsite_id' => $col['empresa_onsite_id'],
            'localidad_onsite_id' => $col['localidad_onsite_id'],
            'direccion' => $col['direccion'],
            'telefono_contacto' => $col['telefono_contacto'],
            'nombre_contacto' => $col['nombre_contacto'],
            'horarios_atencion' => $col['horarios_atencion'],
            'observaciones' => $col['observaciones'],

        ]);
    }


}
