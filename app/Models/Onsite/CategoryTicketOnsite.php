<?php

namespace App\Models\Onsite;

use App\Models\Admin\Company;
use Illuminate\Database\Eloquent\Model;

class CategoryTicketOnsite extends Model
{
    protected $table   = 'category_tickets';
    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'name',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
