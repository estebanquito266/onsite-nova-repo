<?php

namespace App\Models\Respuestos;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenPedidoRespuestosOnsite extends Model
{
    use HasFactory;

    protected $table = "ordenes_pedido_respuestos_onsite";

    protected $fillable = [
        'id',
        'company_id',
        'user_id',
        'estado_id',
        'monto_total',
        'comentarios',        
    ];

    public function company()
	{
		return $this->belongsTo('App\Models\Admin\Company');
	}
}
