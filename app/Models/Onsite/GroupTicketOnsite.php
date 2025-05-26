<?php

namespace App\Models\Onsite;

use App\Models\Admin\Company;
use App\Models\Admin\User;
use Illuminate\Database\Eloquent\Model;

class GroupTicketOnsite extends Model
{
    protected $table   = 'group_tickets';
    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'name',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_group_ticket', 'group_ticket_id', 'user_id');
    }
}
