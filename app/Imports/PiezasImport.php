<?php

namespace App\Imports;

use App\Models\Respuestos\PiezaRespuestosOnsite;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PiezasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $col)
    {
        return new PiezaRespuestosOnsite([
            
            'company_id'        => $col['company_id'],
            'numero'            => $col['numero'],
            'spare_parts_code'  => $col['spare_parts_code'],
            'part_name'         => $col['part_name'],
            'precio_fob'        => $col['precio_fob'],
            'stock'             => $col['stock'],   
            'description'       => $col['description'],
            'part_image'        => $col['part_image'],
            'peso'              => $col['peso'],
            'dimensiones'       => $col['dimensiones'],
            'pia'               => $col['pia']
            
        ]);
    }

    /* public function headingRow(): int
    {
        return 2;
    } */
}
