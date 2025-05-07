<?php

namespace App\Nova\Filters;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\BooleanFilter;

class PerfilPresMontoFilter extends BooleanFilter
{
    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Presup./Claim/Fee';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {                      
        // Mediante base64_decode se decodifica el request para poder evaluar 
        // la selección del usuario
        // ver: https://github.com/Maatwebsite/Laravel-Nova-Excel/issues/80
        if ($request->has('filters')) 
        {           
            $filters = json_decode(base64_decode($request->filters));
            $filtro_presup = 0;
            $filtro_claim = 0;
            $filtro_fee = 0;
            foreach ($filters as $filter) 
            {                
                if (isset($filter->value->presupuesto_ver_monto_presupuesto) && $filter->value->presupuesto_ver_monto_presupuesto == true)
                $filtro_presup = 1;                               
                
                if (isset($filter->value->presupuesto_ver_claim) && $filter->value->presupuesto_ver_claim == true)
                $filtro_claim = 1;                               

                if (isset($filter->value->presupuesto_ver_fee) && $filter->value->presupuesto_ver_fee == true)
                $filtro_fee = 1;                               
                
                if (empty($filter->value)) {
                    continue;
                }
            }

            
                if (($filtro_presup == 1) && ($filtro_claim == 1) && $filtro_fee == 1)
                return  $query->where('presupuesto_ver_monto_presupuesto', $value['presupuesto_ver_monto_presupuesto'])
                              ->orWhere('presupuesto_ver_claim', $value['presupuesto_ver_claim'])
                              ->orWhere('presupuesto_ver_fee', $value['presupuesto_ver_fee']);    ;    
                if (($filtro_presup == 1) && ($filtro_claim == 1))
                return  $query->where('presupuesto_ver_monto_presupuesto', $value['presupuesto_ver_monto_presupuesto'])
                              ->orWhere('presupuesto_ver_claim', $value['presupuesto_ver_claim']);
                
                if (($filtro_presup == 1) && ($filtro_fee == 1))
                return  $query->where('presupuesto_ver_monto_presupuesto', $value['presupuesto_ver_monto_presupuesto'])
                              ->orWhere('presupuesto_ver_fee', $value['presupuesto_ver_fee']);    
                
                if (($filtro_claim == 1) && ($filtro_fee == 1))
                return  $query->where('presupuesto_ver_claim', $value['presupuesto_ver_claim'])
                            ->orWhere('presupuesto_ver_fee', $value['presupuesto_ver_fee']);    
                if (($filtro_presup == 1) && ($filtro_fee == 0) && ($filtro_claim == 0))
                return  $query->where('presupuesto_ver_monto_presupuesto', $value['presupuesto_ver_monto_presupuesto']);
                
                if (($filtro_presup == 0) && ($filtro_fee == 1) && ($filtro_claim == 0))
                return  $query->where('presupuesto_ver_fee', $value['presupuesto_ver_fee']);
    
                if (($filtro_presup == 0) && ($filtro_fee == 0) && ($filtro_claim == 1))
                return  $query->where('presupuesto_ver_claim', $value['presupuesto_ver_claim']);        
            

            
        }

       
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {   
       
        return [
            'VerMontoPresupuesto' => 'presupuesto_ver_monto_presupuesto',
            'VerClaim' => 'presupuesto_ver_claim',
            'VerFee' => 'presupuesto_ver_fee'            
        ];        
        
    }

        /**
     * The default value of the filter.
     *
     * @var string
     */
    public function default()
    {     
       /* return true; 
       se comenta la linea para que tome todos los valores de la consulta por defecto
       */ 
    }
}
