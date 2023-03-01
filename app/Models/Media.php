<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasUlids;

    protected $table = 'media';
    protected $fillable = ['galeri_id', 'file'];

    public static $rulesCreate = [
        'file' => 'required|mimes:jpeg,png,jpg|max:2048'
    ];

    public static function rulesEdit(Media $data)
    {
        return [
            'file' => 'required|mimes:jpeg,png,jpg|max:2048'
        ];
    }
}
