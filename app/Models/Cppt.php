<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cppt extends Model
{
    //
    protected $table = 'vicore_rme.dcppt'; 

    protected $primaryKey = 'id_cppt'; // <-- ganti sesuai kolom primary key

    // public $incrementing = false; // jika bukan auto-increment
    // protected $keyType = 'string'; // atau 'int' jika integer

    protected $fillable = [
      'subjektif', 'objektif', 'objektif', 'asesmen', 'plan'
    ];
}


