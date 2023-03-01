<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Media;
use App\Traits\Resource;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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

    public function show($id)
    {
        $data = $this->model::findOrFail($id);
        return view($this->view . '.show', compact('data'));
    }

    public function anyData()
    {
        return DataTables::of($this->model::query())
            ->addColumn('action', function ($data) {
                $del = '<a href="#" data-id="' . $data->id . '" class="btn btn-danger hapus-data"><i class="fa fa-times"></i></a>';
                $show = '<a href="' . route($this->route . '.show', $data->id) . '" class="btn btn-success"><i class="fa fa-arrow-right"></i></a>';
                $edit = '<a href="' . route($this->route . '.edit', $data->id) . '" class="btn btn-primary"><i class="fa fa-edit"></i></a>';
                return $show . '&nbsp' . $edit . '&nbsp' . $del;
            })
            ->make(true);
    }

//    Media
    public function storeMedia($id, Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $this->validate($request, Media::$rulesCreate);
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid() . '-' . uniqid() . '.' . $extension;
            $path = $file->storeAs('media', $filename);
            Media::create([
                'galeri_id' => $id,
                'file' => $path
            ]);
        }
        echo $path;
        die;
    }

    public function deleteMedia(Request $request)
    {
        if ($request->id != 'undefined') {
            $id = $request->id;
            $data = Media::where('file', $id)->first();
            $file = storage_path('app/' . $data->file);
            unlink($file);
            Media::where('file', $id)->delete();
        }
    }

    public function file($id)
    {
        $poster = Media::find($id);
        $file = storage_path('app/' . $poster->file);
        return response()
            ->file($file, [
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0'
            ]);
    }

    public function reset($id)
    {
        $text = '';
        $data = $this->model::findOrFail($id);
        foreach ($data->media as $datum) {
            $file = storage_path('app/' . $datum->file);
            unlink($file);
            Media::destroy($datum->id);
        }
    }
}
