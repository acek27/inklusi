<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Traits\Resource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KegiatanController extends Controller
{
    use Resource;

    protected $model = Kegiatan::class;
    protected $route = 'kegiatan';
    protected $view = 'admin.kegiatan';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->model::$rulesCreate);
        $data = $request->all();
        $filename = uniqid() . '-' . uniqid() . '.' . $request->path->
            getClientOriginalExtension();
        $path = $request->path->storeAs('kegiatan', $filename);
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
            $path = $request->path->storeAs('kegiatan', $filename);
            $request['path'] = $path;
        }
        $data->update($request->all());
        return redirect(route($this->route . '.index'));
    }

    public function file($id)
    {
        $poster = $this->model::find($id);
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
            ->addColumn('gambar', function ($data) {
                return '<img src="' . route($this->route . '.file', $data->id) . '" style="height: 80px"></img>';
            })
            ->addColumn('date', function ($data) {
                return Carbon::parse($data->date)->isoFormat('D MMMM Y');
            })
            ->addColumn('action', function ($data) {
                $del = '<a href="#" data-id="' . $data->id . '" class="btn btn-danger hapus-data"><i class="fa fa-times"></i></a>';
                $edit = '<a href="' . route($this->route . '.edit', $data->id) . '" class="btn btn-primary"><i class="fa fa-edit"></i></a>';
                return $edit . '&nbsp' . $del;
            })
            ->rawColumns(['action', 'gambar'])
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
