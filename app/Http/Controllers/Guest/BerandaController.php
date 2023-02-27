<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Traits\Resource;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
