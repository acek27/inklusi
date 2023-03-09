<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasUlids;

    protected $table = 'video';
    protected $fillable = ['judul', 'embed'];

    public static $rulesCreate = [
        'judul' => 'required',
        'embed' => 'required',
    ];

    public static function rulesEdit(Video $data)
    {
        return [
            'judul' => 'required',
            'embed' => 'required',
        ];
    }
}
