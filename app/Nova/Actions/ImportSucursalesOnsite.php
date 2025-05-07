<?php

namespace App\Nova\Actions;

use App\Imports\SucursalOnsiteImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\File;
use Maatwebsite\Excel\Facades\Excel;

class ImportSucursalesOnsite extends Action
{
    use InteractsWithQueue, Queueable;
    public $standalone = true;
    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        Excel::import(new SucursalOnsiteImport, $fields->file);
        return Action::message('Sucursales Onsite - Importación correcta de datos.');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */

    public function fields()
    {
        $downloadLink = '<a publicpath href= "/imports/plantilla_import_sucursal_onsite.csv">Descargá un modelo csv de ejemplo</a>';
        $insertHeader = 'ID, COMPANY_ID, CODIGO_SUCURSAL, RAZON_SOCIAL, EMPRESA_ONSITE_ID, LOCALIDAD_ONSITE_ID, DIRECCION, TELEFONO_CONTACTO, NOMBRE_CONTACTO, HORARIOS_ATENCION, OBSERVACIONES';
        $insertRequired = 'COMPANY_ID, CODIGO_SUCURSAL, RAZON_SOCIAL, EMPRESA_ONSITE_ID, LOCALIDAD_ONSITE_ID, NOMBRE_CONTACTO';
        $insertOptional = 'ID, DIRECCION, TELEFONO_CONTACTO, HORARIOS_ATENCION, OBSERVACIONES';
        
        return [
            File::make('File')
                ->rules('required')
                ->help('<br><br><strong>CABECERA REQUERIDA</strong>' . '<br>' . $downloadLink . 
                    '<br><br>Campos : <br>' . $insertHeader . '<br>' .
                    '<br><br>Campos requeridos para insertar: <br>' . $insertRequired . '<br>' .
                    '<br>Campos opcionales:<br>'.$insertOptional),
        ];
    }
}
