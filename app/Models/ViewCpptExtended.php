<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewCpptExtended extends Model
{
    protected $table = 'view_cppt_extended';
    
    // View biasanya tidak punya primary key otomatis
    public $incrementing = false;
    public $timestamps = false;

    // Jika view punya primary key seperti id_cppt:
    protected $primaryKey = 'id_cppt';
}
