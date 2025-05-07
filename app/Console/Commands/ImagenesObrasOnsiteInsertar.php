<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Onsite\ImagenObraOnsite;
use App\Models\Onsite\ObraOnsite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class ImagenesObrasOnsiteInsertar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'imagenObraOnsite:insertarImagenObraOnsite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Registra los esquemas de obra en la nueva tabla de Imágenes Obras Onsite';

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
     * @return mixed
     */
    public function handle()
    {

        Log::info('ImagenesObraOnsiteInsertar-----');
        echo 'ImagenesObraOnsiteInsertar';

        try {
        $obrasOnsite = ObraOnsite::all();

        echo '<br>'.count($obrasOnsite);
        Log::info('ObrasOnsite-----'. count($obrasOnsite));
        $bar = $this->output->createProgressBar(count($obrasOnsite));
        $bar->start();
        $cantidad = 0;

        
            DB::beginTransaction();
            foreach ($obrasOnsite as $obrasOnsite) {

                $imagenObraArray = [
                    'company_id' => $obrasOnsite->company_id,
                    'obra_onsite_id'=> $obrasOnsite->id,
                    'tipo_imagen_onsite_id'=>18,
                    'archivo'=>($obrasOnsite->esquema !==null ? $obrasOnsite->esquema: 'default.jpg' ),
                    'descripcion'=>'',
                    'created_at'=>$obrasOnsite->created_at,
                    'updated_at'=>$obrasOnsite->updated_at
                    
                ];

                echo $obrasOnsite->id.' / ';

                $imagenObraOnsite = ImagenObraOnsite::create($imagenObraArray);


                $this->info('-------------------');
                $info = 'Imagen Obra id: ' . $imagenObraOnsite->id;
                $this->info($info);
                $this->info(' ');
                $this->info('####  Imagen obra Info ######');
                $this->info($imagenObraOnsite);
                $this->info('-------------------');

                $bar->advance();

                $cantidad++;
            }

            DB::commit();

            $bar->finish();
        } catch (Throwable $e) {
            DB::rollBack();

            throw $e;
        }

        echo $cantidad;

        Log::info($cantidad);
    }
}
