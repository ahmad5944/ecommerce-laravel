<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Cuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'alasan',
        'tanggal_cuti',
        'selesai_cuti',
    ];
    protected $table = 'cuti';

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }
}
