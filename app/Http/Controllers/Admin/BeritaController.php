<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kategori;
use App\Traits\Resource;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    use Resource;

    protected $model = Berita::class;
    protected $route = 'berita';
    protected $view = 'admin.berita';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $kategori = Kategori::all()->pluck('category_name', 'id');
        return view($this->view . '.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->model::$rulesCreate);
        $data = $request->all();
        $filename = uniqid() . '-' . uniqid() . '.' . $request->path->
            getClientOriginalExtension();
        $path = $request->path->storeAs('berita', $filename);
        $data['path'] = $path;
        $this->model::create($data);
        return redirect(route($this->route . '.index'));
    }

    public function edit($id)
    {
        $data = $this->model::find($id);
        $kategori = Kategori::all()->pluck('category_name', 'id');
        return view($this->view . '.edit', compact('data', 'kategori'));
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

    public function destroy($id)
    {
        $data = Berita::findOrFail($id);
        $file = storage_path('app/' . $data->path);
        unlink($file);
        $this->model::destroy($id);
    }
}
