<?php

namespace App\Models\Onsite;

use App\Models\Admin\Company;
use Illuminate\Database\Eloquent\Model;

class PriorityTicketOnsite extends Model
{
    protected $table   = 'priority_tickets';
    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'name',
        'color',
        'value',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
