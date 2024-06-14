<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DprSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'jenis_kelamin',
        'kewarganegaraan', 
        'tempat_tanggal_lahir', 
        'partai', 
        'alamat', 
        'kota', 
        'provinsi', 
        'kode_pos', 
        'visi_misi', 
        'pendidikan', 
        'pengalaman_kerja', 
        'organisasi', 
        'prestasi',
        'foto',
    ];

    public function votedprs()
    {
        return $this->hasMany(Vote::class);
    }
}
