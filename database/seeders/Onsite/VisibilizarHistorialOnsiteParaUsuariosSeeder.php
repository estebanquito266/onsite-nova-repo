<?php

use App\Models\Admin\User;
use App\Models\Onsite\HistorialEstadoOnsite;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisibilizarHistorialOnsiteParaUsuariosSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $users = User::whereHas('perfiles', function ($query) {
      $query->whereIn('perfiles.id', [10, 61, 62, 63, 64]);
    });

    $usuarios = $users->get();

    $historiales_estado_onsite = HistorialEstadoOnsite::whereIn('company_id', $users->groupBy('company_id')->pluck('company_id'))->where('visible', 1);

    foreach ($historiales_estado_onsite->get() as $historial_estado_onsite) {
      foreach ($usuarios as $user) {
        if ($user->companies && $user->companies->first()) {
          if ($historial_estado_onsite->company_id == $user->companies->first()->id) {
            $historialEstadoOnsiteVisible = DB::table('historial_estados_onsite_visible_por_user')
              ->where('users_id', $user->id)
              ->where('historial_estados_onsite_id', $historial_estado_onsite->id)
              ->first();

            if (!$historialEstadoOnsiteVisible) {
              DB::table('historial_estados_onsite_visible_por_user')->insert([
                'users_id' => $user->id,
                'historial_estados_onsite_id' => $historial_estado_onsite->id,
              ]);
            }
          }
        }
      }
    }
  }
}
