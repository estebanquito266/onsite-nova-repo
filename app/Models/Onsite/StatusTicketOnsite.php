<?php

namespace App\Models\Onsite;

use App\Models\Admin\Company;
use Illuminate\Database\Eloquent\Model;

class StatusTicketOnsite extends Model
{
    protected $table   = 'status_tickets';
    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'name',
        'admin',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
