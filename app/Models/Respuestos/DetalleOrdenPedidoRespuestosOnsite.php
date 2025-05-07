<?php


namespace App\Models\Respuestos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleOrdenPedidoRespuestosOnsite extends Model
{
    use HasFactory;

    protected $table = "detalles_respuestos_onsite";

    protected $fillable = [
        'id',
        'company_id',
        'orden_pedido_respuestos_onsite_id',
        /* 'categoria_respuestos_onsite_id',
        'modelo_respuestos_onsite_id', */
        'pieza_respuestos_onsite_id',

        'cantidad',
        'precio_fob',
        'precio_total'

    ];

    public function company()
	{
		return $this->belongsTo('App\Models\Admin\Company');
	}
}
