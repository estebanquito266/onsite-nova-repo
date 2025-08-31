<?php

namespace App\Models\Onsite;

use App\Models\Admin\Company;
use App\Models\Admin\User;
use Illuminate\Database\Eloquent\Model;

class UserGroupTicketOnsite extends Model
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

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function group_ticket()
    {
        return $this->belongsTo(GroupTicketOnsite::class, 'group_ticket_id');
    }
}
