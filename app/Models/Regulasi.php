<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulasi extends Model
{
    use HasUlids;

    protected $table = 'regulasi';
    protected $fillable = ['jenis_id', 'judul', 'nomor', 'tahun', 'path'];
    protected $with = 'jenis';

    public static $rulesCreate = [
        'judul' => 'required',
        'jenis_id' => 'required',
        'nomor' => 'required',
        'path' => 'required',
        'tahun' => 'required'
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}
