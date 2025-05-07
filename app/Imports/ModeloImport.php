<?php

namespace App\Imports;


use App\Models\Respuestos\ModeloRespuestosOnsite;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ModeloImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $col)
    {
        return new ModeloRespuestosOnsite([
            
            'id' => $col['id'],
            'nombre' => $col['nombre'],
            'company_id' => $col['company_id'],
            'imagen_despiece' => $col['imagen_despiece'],
            'campo_padre' => $col['campo_padre'],

            'categoria_respuestos_onsite_id' 
                => $col['categoria_respuestos_onsite_id']

        ]);
    }

    /* public function headingRow(): int
    {
        return 2;
    } */
}
