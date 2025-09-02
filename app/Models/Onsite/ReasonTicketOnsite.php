<?php

namespace App\Models\Onsite;

use App\Models\Admin\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReasonTicketOnsite extends Model
{
    protected $table = 'reason_tickets';

    protected $fillable = [
        'company_id',
        'name',
        'active',
    ];


    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}
