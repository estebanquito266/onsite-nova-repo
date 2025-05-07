<?php

namespace App\Imports;

use App\Models\Respuestos\ModeloPiezaOnsite;
use App\Models\Respuestos\ModeloRespuestosOnsite;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ModeloPiezaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $col)
    {
        return new ModeloPiezaOnsite([
            'company_id' => $col['company_id'],
            'numero' => $col['numero'],

            'modelo_respuestos_id' => $col['modelo_respuestos_id'],            
            'pieza_respuestos_id' => $col['pieza_respuestos_id']


        ]);
    }

    /* public function headingRow(): int
    {
        return 2;
    } */
}
