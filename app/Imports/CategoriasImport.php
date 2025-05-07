<?php

namespace App\Imports;

use App\Models\Respuestos\CategoriaRespuestosOnsite;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriasImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $col)
    {
        return new CategoriaRespuestosOnsite([

            'id' => $col['id'],
            'nombre' => $col['nombre'],
            'company_id' => $col['company_id'],

        ]);
    }

    /* public function headingRow(): int
    {
        return 2;
    } */
}
