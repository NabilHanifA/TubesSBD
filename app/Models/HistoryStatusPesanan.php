<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryStatusPesanan extends Model
{
    use HasFactory;
    protected $table = 'history_status_pesanan';
    protected $guarded = ['id'];
}
