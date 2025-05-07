<?php

namespace App\Console\Commands;

use App\Models\Onsite\ObraOnsite;
use Illuminate\Console\Command;

class ObraOnsiteFix extends Command
{
    protected $signature = 'obraonsite:fix';

    protected $description = 'Obtener localidad, provincia y pais a partir del domicilio en ObraOnsite';

    public function handle()
    {
        $this->info('Inicio: inspeccionando en obras_onsite el domicilio.');
        $obras = ObraOnsite::all();

        $totalObras = 0;
        $obrasConLocalidad = 0;
        $obrasConProvincia = 0;

        foreach ($obras as $obra) {
            $domicilio = $obra->domicilio;

            // Obtener la localidad
            $localidad = $this->getCoincidencia($domicilio, 'localidades', 'localidad');
            if ($localidad) {
                $obra->localidad_txt = $localidad;
                $obrasConLocalidad++;
            }

            // Obtener la provincia
            $provincia = $this->getCoincidencia($domicilio, 'provincias', 'nombre');
            if ($provincia) {
                $obra->provincia_txt = $provincia;
                $obrasConProvincia++;
            }

            // Obtener el país
            $obra->pais_txt = 'Argentina';

            $totalObras++;

            $obra->save();
        }

        $this->info('Fin: Se termino de evaluar y ejecutar las coincidencias.');
        $this->info('Cantidad de obras: ' . $totalObras);
        $this->info('Cantidad de obras con localidad modificada: ' . $obrasConLocalidad);
        $this->info('Cantidad de obras con provincia modificada: ' . $obrasConProvincia);
    }

    private function getCoincidencia($domicilio, $tableName, $columnName)
    {
        $values = preg_split("/[,\\-]/", $domicilio);
        $values = array_map('trim', $values);

        foreach ($values as $value) {

            if ('provincias' === $tableName) {
                // Remocion de "Provincia de "
                $value = str_replace('Provincia de ', '', $value);
            }

            $result = \DB::table($tableName)
                ->where($columnName, $value)
                ->value($columnName);

            if ($result) {
                return $result;
            }
        }

        return null;
    }
}
