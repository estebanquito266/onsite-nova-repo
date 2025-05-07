<?php

namespace App\Models\Respuestos;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoOrdenPedidoRespuestosOnsite extends Model
{
    use HasFactory;

    protected $table = "estados_ordenes_pedido_respuestos_onsite";

    protected $fillable = [
        'id',
        'company_id',
        'nombre',

    ];

    public function company()
	{
		return $this->belongsTo('App\Models\Admin\Company');
	}
}
