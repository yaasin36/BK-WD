<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $guarded = []; // Atau gunakan $fillable untuk keamanan
    protected $table = "pasien";
    public $timestamps = false; // Tambahkan ini jika tabel tidak memiliki timestamps

    // Relasi ke model lain (contoh jika diperlukan)
    public function daftarPoliklinik()
    {
        return $this->hasMany(DaftarPoliklinik::class, 'id_pasien', 'id');
    }
}
