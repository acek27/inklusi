<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use App\Models\Regulasi;
use App\Traits\Resource;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RegulasiController extends Controller
{
    use Resource;

    protected $model = Regulasi::class;
    protected $route = 'regulasi';
    protected $view = 'admin.regulasi';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $jenis = Jenis::all()->pluck('nama_jenis', 'id');
        return view($this->view . '.create', compact('jenis'));
    }

    public function edit($id)
    {

        $data = $this->model::findOrFail($id);
        $jenis = Jenis::all()->pluck('nama_jenis', 'id');
        return view($this->view . '.edit', compact('jenis', 'data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->model::$rulesCreate);
        $data = $request->all();
        $filename = uniqid() . '-' . uniqid() . '.' . $request->path->
            getClientOriginalExtension();
        $path = $request->path->storeAs('regulasi', $filename);
        $data['path'] = $path;
        $this->model::create($data);
        return redirect(route($this->route . '.index'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->model::find($id);
        $this->validate($request, $this->model::rulesEdit($data));
        if ($request->file('path') == '') {
            unset($data['path']);
        } else {
            $filename = uniqid() . '-' . uniqid() . '.' . $request->path->
                getClientOriginalExtension();
            $path = $request->path->storeAs('berita', $filename);
            $request['path'] = $path;
        }
        $data->update($request->all());
        return redirect(route($this->route . '.index'));
    }

    public function file($id)
    {
        $poster = Regulasi::find($id);
        $file = storage_path('app/' . $poster->path);
        return response()
            ->file($file, [
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0'
            ]);
    }

    public function anyData()
    {
        return DataTables::of($this->model::query())
            ->addColumn('unduh', function ($data) {
                $unduh = '<a href="' . route($this->route . '.file', $data->id) . '" class="btn btn-primary" target="_blank"><i class="fa fa-download"></i></a>';
                return $unduh;
            })
            ->addColumn('action', function ($data) {
                $del = '<a href="#" data-id="' . $data->id . '" class="btn btn-danger hapus-data"><i class="fa fa-times"></i></a>';
                $edit = '<a href="' . route($this->route . '.edit', $data->id) . '" class="btn btn-primary"><i class="fa fa-edit"></i></a>';
                return $edit . '&nbsp' . $del;
            })
            ->rawColumns(['unduh', 'action'])
            ->make(true);
    }
    public function destroy($id)
    {
        $data = $this->model::findOrFail($id);
        $file = storage_path('app/' . $data->path);
        unlink($file);
        $this->model::destroy($id);
    }
}
