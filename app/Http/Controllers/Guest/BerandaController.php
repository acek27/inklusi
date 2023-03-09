<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Traits\Resource;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $berita = Berita::orderBy('created_at', 'DESC')->get();
        return view('welcome', compact('berita'));
    }
}
