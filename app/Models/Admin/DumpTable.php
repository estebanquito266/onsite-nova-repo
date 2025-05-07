<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DumpTable extends Model
{
    use HasFactory;

    protected $table = "dump_table";

    protected $fillable = [
        'id',
        'name_table',
        'type_table',
    
    ];    
}
