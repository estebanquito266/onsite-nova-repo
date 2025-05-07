<?php

namespace App\Imports;

use App\Models\Respuestos\CategoriaRespuestosOnsite;
use App\Models\Respuestos\ImagenModelosRepuestos;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImagenesModelosImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $col)
    {
        return new ImagenModelosRepuestos([

            'modelo_respuestos_id' => $col['modelo_respuestos_id'],
            'company_id' => $col['company_id'],
            'imagen_despiece' => $col['imagen_despiece'],



        ]);
    }

    /* public function headingRow(): int
    {
        return 2;
    } */
}
