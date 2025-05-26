<?php

namespace App\Models\Onsite;

use App\Models\Admin\User;
use App\Models\Cliente\Cliente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentTicketOnsite extends Model
{
    protected $table = 'comment_tickets';

    protected $fillable= [
        'company_id',
        'ticket_id',
        'user_comment_id',
        'cliente_id',
        'group_user_receiver_id',
        'user_receiver_id',
        'comment',
        'file',
    ];


    public function ticket(): BelongsTo
    {
        return $this->belongsTo(TicketOnsite::class,'ticket_id');
    }

    public function user_comment(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_comment_id');
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(EmpresaOnsite::class, 'cliente_id');
    }

    public function user_receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_receiver_id');
    }
}
