<?php

namespace App\Imports;

use App\Models\Respuestos\PiezaRespuestosOnsite;
use App\Models\Respuestos\PrecioPiezaRepuestoOnsite;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PreciosPiezaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $col)
    {
        
        return new PrecioPiezaRepuestoOnsite([


            'piezas_respuestos_onsite_id' => $col['piezas_respuestos_onsite_id'],
            'spare_parts_code' => $col['spare_parts_code'],
            'precio_fob' => $col['precio_fob'],
            'version' => $col['version'],
            'vencimiento_precio' => $col['vencimiento_precio'],

            'company_id' => $col['company_id'],

        ]);
    }

    /* public function headingRow(): int
    {
        return 2;
    } */
}
