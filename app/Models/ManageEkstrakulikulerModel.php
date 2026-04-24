<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManageEkstrakulikulerModel extends Model
{
    // WAJIB: Karena nama model tidak standar Laravel (bukan Ekstrakulikuler),
    // Anda harus menentukan nama tabel secara manual.
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
}
