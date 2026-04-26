<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact'; //
    protected $fillable = [
        'name',
        'email',
        'nip',
        'unit_kerja',
        'jenis_perangkat',
        'mac_address',
        'reply'
    ];
}
