<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasUlids;

    protected $table = 'galeri';
    protected $fillable = ['nama_kegiatan', 'date', 'tempat'];

    public static $rulesCreate = [
        'nama_kegiatan' => 'required',
        'date' => 'required|date',
        'tempat' => 'required'
    ];

    public static function rulesEdit(Galeri $data)
    {
        return [
            'nama_kegiatan' => 'required',
            'date' => 'required|date',
            'tempat' => 'required'
        ];
    }
}
