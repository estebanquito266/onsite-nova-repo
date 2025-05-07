<?php

namespace App\Console\Commands;

use App\Models\Admin\User;
use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use App\Models\EmpresaInstaladora\EmpresaInstaladoraUser;
use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\LocalidadOnsite;
use App\Models\Onsite\ObraOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class setNumeroCuentaBghEmpresas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:setNumeroCuentaBghEmpresas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recorre tabla empresas_instaladoras->usuarios y le asigna el numero_cuenta_bgh del usuario a la empresa';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $empresas = EmpresaInstaladoraOnsite::all();


        foreach ($empresas as $empresa) {

            $this->info('empresa consultada correctamente. empresa ID: ' . $empresa->id);            

            $empresaUsers = EmpresaInstaladoraUser::where('empresa_instaladora_id', $empresa->id)->get();

            if (count($empresaUsers) > 0) {
                $this->info('Empresa posee Usuarios Asignados: ' . count($empresaUsers));
                

                foreach ($empresaUsers as $user) {
                    $userId = $user->user_id;
                    $user = User::find($userId);

                    if ($user) {
                        $this->info('Usuario consultado: ' . $user->name);
                        
                        $userNroCuenta = $user->numero_cuenta_respuestos_onsite;

                        if ($userNroCuenta != null) {
                            $empresa->numero_cuenta_bgh = $userNroCuenta;
                            $empresa->save();

                            $this->info('Empresa actualizada: ' . $empresa->nombre);
                            $this->info('Nº Asignado actualizado: ' . $empresa->numero_cuenta_bgh);
                            $this->info('');
                            

                            break;
                        } else {
                            $this->info('Usuario no posee cuenta: ' . $user->name);
                            $this->info('');                            
                        }
                    } else
                        $this->info('Usuario NO existe: ' . $userId);
                        $this->info('');
                }
            } else {
                $this->info('Empresa NO posee usuarios asignados: ' . $empresa->nombre);
                $this->info('');

            }
        }
    }
}
