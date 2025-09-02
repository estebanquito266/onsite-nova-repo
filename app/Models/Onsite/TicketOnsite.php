<?php

namespace App\Models\Onsite;

use App\Models\Admin\Company;
use App\Models\Admin\User;
use App\Models\Cliente\Cliente;
use App\Models\Derivacion\ClienteDerivacion;
use App\Models\Derivacion\Derivacion;
use App\Models\Reparacion\Reparacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TicketOnsite extends Model
{
    protected $table = 'tickets';
    protected $fillable = ['reparacion_id','derivacion_id','cliente_id','user_id','category_ticket_id','status_ticket_id','priority_ticket_id','detail','file','company_id','motivo_consulta_ticket_id',
                        'user_owner_id','cliente_derivacion_id','type','group_user_receiver_id'];

    public function reparacion(): BelongsTo
    {
        return $this->belongsTo(ReparacionOnsite::class,'reparacion_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(EmpresaOnsite::class,'cliente_id');
    }

    public function motivo_consulta_ticket(): BelongsTo
    {
        return $this->belongsTo(ReasonTicketOnsite::class,'motivo_consulta_ticket_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(CommentTicketOnsite::class,'ticket_id');
    }


    public function category_ticket(): BelongsTo
    {
        return $this->belongsTo(CategoryTicketOnsite::class,'category_ticket_id');
    }

    public function status_ticket(): BelongsTo
    {
        return $this->belongsTo(StatusTicketOnsite::class,'status_ticket_id');
    }

    public function priority_ticket(): BelongsTo
    {
        return $this->belongsTo(PriorityTicketOnsite::class,'priority_ticket_id');
    }
}
