<?php

namespace App\Models\Onsite;

use App\Models\Admin\Company;
use App\Models\Admin\User;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserGroupTicketOnsite extends Pivot
{
    protected $table   = 'user_group_ticket';
    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'user_id',
        'group_ticket_id',
    ];

    public static function booted()
    {
        static::creating(function ($pivot) {
            if (!$pivot->company_id && $pivot->group_ticket_id) {
                $group = GroupTicketOnsite::find($pivot->group_ticket_id);
                if ($group) {
                    $pivot->company_id = $group->company_id;
                }
            }
        });
    }

}
