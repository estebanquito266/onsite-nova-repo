<?php

namespace App\Nova\Actions;

use App\Imports\LocalidadOnsiteImport;
use App\Imports\SucursalOnsiteImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\File;
use Maatwebsite\Excel\Facades\Excel;

class ImportLocalidadesOnsite extends Action
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
        Excel::import(new LocalidadOnsiteImport, $fields->file);
        return Action::message('Localidades Onsite - Importación correcta de datos.');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */

    public function fields()
    {
        $downloadLink = '<a publicpath href= "/imports/plantilla_import_localidad_onsite.csv">Descargá un modelo csv de ejemplo</a>';
        $insertHeader = 'ID, COMPANY_ID, ID_PROVINCIA, LOCALIDAD, LOCALIDAD_ESTANDARD, CODIGO, KM, ID_NIVEL, ATIENDE_DESDE, ID_USUARIO_TECNICO';
        $insertRequired = 'COMPANY_ID, ID_PROVINCIA, LOCALIDAD, LOCALIDAD_ESTANDARD, CODIGO, KM, ID_NIVEL, ATIENDE_DESDE, ID_USUARIO_TECNICO';
        $insertOptional = 'ID,';
       
        return [
            File::make('File')
                ->rules('required')
                ->help('<br><br><strong>CABECERA REQUERIDA</strong>' . '<br>' . $downloadLink . 
                    '<br><br>Campos: <br>' . $insertHeader . '<br>' .
                    '<br><br>Campos requeridos para insertar: <br>' . $insertRequired . '<br>' .
                    '<br>Campos opcionales:<br>'. $insertOptional),
        ];
    }
}
