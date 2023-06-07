<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakPesan extends Model
{
    use HasFactory;
    protected $table = 'kontak_pesan';
    protected $guarded = ['id'];
}
