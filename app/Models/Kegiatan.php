<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasUlids;

    protected $table = 'kegiatan';
    protected $fillable = ['nama_kegiatan', 'date', 'tempat', 'path'];
    public static $rulesCreate = [
        'nama_kegiatan' => 'required',
        'date' => 'required|date',
        'tempat' => 'required',
        'path' => 'required|image',
    ];

    public static function rulesEdit(Kegiatan $data)
    {
        return [
            'nama_kegiatan' => 'required',
            'date' => 'required|date',
            'tempat' => 'required',
        ];
    }

}
