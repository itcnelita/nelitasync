<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EkstrakulikulerModel extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara manual
    protected $table = 'ekstrakulikuler';

    protected $fillable = [
        'name',
        'category',
        'pembina',
        'day',
        'time',
        'location',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
