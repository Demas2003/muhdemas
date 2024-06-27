<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_studi extends Model
{
    use HasFactory;
    protected $table = 'program_studis';
    protected $primarykey = 'id';
    protected $fillable = [
        'kode_prodi',
        'nama_prodi',
        'id_fakultas',
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

}
