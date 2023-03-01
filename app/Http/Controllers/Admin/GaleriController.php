<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Traits\Resource;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    use Resource;

    protected $model = Galeri::class;
    protected $route = 'galeri';
    protected $view = 'admin.galeri';

    public function __construct()
    {
        $this->middleware('auth');
    }

}
