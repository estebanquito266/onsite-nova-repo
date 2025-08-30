<?php

namespace App\Nova;
use App\Nova\Filters\TipoVisibilidadFilter;
use App\Nova\Actions\AddEmpresaReparacionesOnsiteCerradasConfirmadas;
use App\Nova\Actions\AddHistorialEstadoOnsiteVisible;
use App\Nova\Actions\RemoveEmpresaReparacionesOnsiteCerradasConfirmadas;
use App\Nova\Actions\RemoveHistorialEstadoOnsiteVisible;
use Benjacho\BelongsToManyField\BelongsToManyField;
use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Jackabox\DuplicateField\DuplicateField;
use Carbon\Carbon;
use Laravel\Nova\Fields\Number;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Admin\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'email',
        'domicilio',
        'cuit',
        'telefono',
        'id_tipo_visibilidad',
        'foto_perfil',
    ];

    public static $orderBy = [
        'name' => 'asc'
    ];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Admin';

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $hash = strval(Carbon::now()->hour) . strval(Carbon::now()->minute) . strval(Carbon::now()->second);

        return [
            ID::make()->sortable(),
            Image::make('Foto Perfil', 'foto_perfil')
                ->disk('imagenes')
                //->path('imagenes')
                ->storeAs(function (Request $request) {
                    $name = $this->getCustomFilename('user_avatar', $request->foto_perfil->getClientOriginalName(), $request->name);
                    Storage::disk('ftpSpeedupExportImagenes')->put($name, File::get($request->foto_perfil));
                    Storage::disk('ftpSpeedupOnsiteExportImagenes')->put($name, File::get($request->foto_perfil));
                    return $name;
                }),
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),
            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),
            Text::make('Domicilio')
                ->hideFromIndex()
                ->rules('required', 'max:255'),
            Text::make('Telefono')
                ->hideFromIndex()
                ->rules('required', 'max:255'),
            Text::make('Cuit')
                ->hideFromIndex()
                ->rules('required', 'max:255'),
            BelongsTo::make('Tipo Visibilidad', 'tipo_visibilidad')->sortable(),
            BelongsToMany::make('Empresa Instaladora Onsite', 'empresa_instaladora'),
            BelongsToManyField::make('Empresa Instaladora', 'empresa_instaladora', 'App\Nova\EmpresaInstaladoraOnsite')->canSelectAll('Seleccionar Todo'),
                
            //BelongsTo::make('Company'),

            DuplicateField::make('Duplicate')
                ->withMeta([
                    'resource' => 'users', // resource url
                    'model' => 'App\Models\Admin\User', // model path
                    'id' => $this->id, // id of record
                    'relations' => [ 'user_companies', 'sucursales_user', 'perfiles_usuarios', 'user_empresas_onsite', 'user_sucursales_onsite'], // an array of any relations to load (nullable).
                    'except' => [], // an array of fields to not replicate (nullable).
                    'override' => ['email' => 'mail'.$hash.'@mail.com'] // an array of fields and values which will be set on the modal after duplicating (nullable).
                ]),

            BelongsToMany::make('Companies', 'companies'),
            //BelongsToMany::make('Sucursal', 'sucursales'),
            //BelongsToMany::make('Perfil', 'perfiles'),
            HasMany::make('Perfil Usuario', 'perfiles_usuarios'),
            BelongsToMany::make('Empresa Onsite', 'empresas_onsite'),
            BelongsToMany::make('Sucursal Onsite', 'sucursales_onsite'),
            //BelongsToMany::make('Historiales Estados Onsite', 'historiales_estados_onsite'),
            HasMany::make('HistorialEstadoOnsite', 'historial_estado_onsite'),
            HasMany::make('LocalidadOnsite', 'localidad_onsite'),
            //HasMany::make('Horario', 'horarios'),
            //HasMany::make('Reparacion', 'reparaciones'),
            //HasMany::make('ReparacionesTecnico', 'reparaciones_tecnicos'),
            //HasMany::make('HistorialEstado', 'historial_estado'),
            //HasMany::make('Notas', 'notas'),
            //HasMany::make('OrdenRetiroFixupPoint', 'ordenes_retiro_fixup_point'),
            //HasMany::make('HistorialEstadoDerivacion', 'historial_estado_derivacion'),
           // BelongsToMany::make('Cliente', 'clientes'),
           Number::make('Descuento Respuestos', 'descuento_respuestos_onsite')->step(0.01),
           Text::make('Nº Cuenta Respuestos', 'numero_cuenta_respuestos_onsite'),
           

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            New TipoVisibilidadFilter
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new AddHistorialEstadoOnsiteVisible()),
            (new RemoveHistorialEstadoOnsiteVisible()),
            //(new AddEmpresaReparacionesOnsiteCerradasConfirmadas()),
            //(new RemoveEmpresaReparacionesOnsiteCerradasConfirmadas()),
        ];
    }
}
