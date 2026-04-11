<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceModel extends Model
{
    protected $fillable = [
        'id',
        'id_identity',
        'log_in',
    ];
}
