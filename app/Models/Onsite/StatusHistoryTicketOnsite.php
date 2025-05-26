<?php

namespace App\Models\Onsite;

use App\Models\Admin\Company;
use App\Models\Admin\User;
use Illuminate\Database\Eloquent\Model;

class StatusHistoryTicketOnsite extends Model
{
    protected $table = 'status_history_tickets';

    protected $fillable = [
        'company_id',
	    'ticket_id',
	    'status_ticket_id',
	    'user_id',
	    'comment',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function ticket()
    {
        return $this->belongsTo(TicketOnsite::class, 'ticket_id');
    }

    public function status_ticket()
    {
        return $this->belongsTo(StatusTicketOnsite::class, 'status_ticket_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
