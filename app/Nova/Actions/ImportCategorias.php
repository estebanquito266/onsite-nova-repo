<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class ImportCategorias extends Action
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
        \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\CategoriasImport, $fields->file);
        return Action::message('Importación correcta de datos.');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [\Laravel\Nova\Fields\File::make('File')
        ->rules('required'),];
    }
}
