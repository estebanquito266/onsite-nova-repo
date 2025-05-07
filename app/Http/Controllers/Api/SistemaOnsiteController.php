<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Onsite\SistemaOnsite;
use Exception;

class SistemaOnsiteController extends Controller
{
    /**
     * Muestra una lista de los sistemas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $sistemas = SistemaOnsite::all();
            return response()->json($sistemas);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener los sistemas.'], 500);
        }
    }

    /**
     * Almacena un sistema recién creado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|exists:companies,id',
            'empresa_onsite_id' => 'required|exists:empresas_onsite,id',
            'sucursal_onsite_id' => 'required|exists:sucursales_onsite,id',
            'obra_onsite_id' => 'required|exists:obras_onsite,id',
            'comprador_onsite_id' => 'required|exists:compradores_onsite,id',
            'nombre' => 'required',
            'fecha_compra' => 'nullable|date',
            'numero_factura' => 'nullable|string',
            'comentarios' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        try {
            $sistema = SistemaOnsite::create($request->all());
            return response()->json($sistema, 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al crear el sistema.'], 500);
        }
    }

    /**
     * Muestra el sistema especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $sistema = SistemaOnsite::findOrFail($id);
            return response()->json($sistema);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener el sistema.'], 500);
        }
    }

    /**
     * Actualiza el sistema especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'exists:companies,id',
            'empresa_onsite_id' => 'exists:empresas_onsite,id',
            'sucursal_onsite_id' => 'exists:sucursales_onsite,id',
            'obra_onsite_id' => 'exists:obras_onsite,id',
            'comprador_onsite_id' => 'exists:compradores_onsite,id',
            'nombre' => 'required',
            'fecha_compra' => 'nullable|date',
            'numero_factura' => 'nullable|string',
            'comentarios' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        try {
            $sistema = SistemaOnsite::findOrFail($id);
            $sistema->update($request->all());
            return response()->json($sistema);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al actualizar el sistema.'], 500);
        }
    }

    /**
     * Elimina el sistema especificado del almacenamiento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $sistema = SistemaOnsite::findOrFail($id);
            $sistema->delete();
            return response()->json(['message' => 'Sistema eliminado correctamente.']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al eliminar el sistema.'], 500);
        }
    }
}
