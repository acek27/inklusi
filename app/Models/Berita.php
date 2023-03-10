<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasUlids;

    protected $table = 'berita';
    protected $fillable = ['category_id', 'title', 'content', 'path', 'editor', 'date'];
    protected $with = ['kategori'];

    public static $rulesCreate = [
        'category_id' => 'required',
        'title' => 'required',
        'content' => 'required',
        'path' => 'required',
        'date' => 'required|date',
        'editor' => 'required'
    ];

    public static function rulesEdit(Berita $data)
    {
        return [
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'date' => 'required|date',
            'editor' => 'required'
        ];
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'category_id');
    }
}
