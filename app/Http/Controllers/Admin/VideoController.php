<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Traits\Resource;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VideoController extends Controller
{
    use Resource;

    protected $model = Video::class;
    protected $route = 'video';
    protected $view = 'admin.video';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function anyData()
    {
        return DataTables::of($this->model::query())
            ->addColumn('embed', function ($data) {
                return '<div class="video-container">'.$data->embed.'</div>';
            })
            ->addColumn('action', function ($data) {
                $del = '<a href="#" data-id="' . $data->id . '" class="btn btn-danger hapus-data"><i class="fa fa-times"></i></a>';
                $edit = '<a href="' . route($this->route . '.edit', $data->id) . '" class="btn btn-primary"><i class="fa fa-edit"></i></a>';
                return $edit . '&nbsp' . $del;
            })
            ->rawColumns(['action', 'embed'])
            ->make(true);
    }
}
