<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;


class ServiceController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Service';
        $this->resources = 'admin.services.';
        $this->route = 'services.';
    }
    /**
     * Display a listing of the resource.
     */



    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Service::orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function ($row) {
                    return '<p class="text-dark-75 font-weight-normal d-block font-size-h6">' . '#' . $row->id . ' ' . $row->name . '</p>';
                })
                ->editColumn('description', function ($row) {
                    return Str::limit(strip_tags($row->description), 300, '...');
                })
                ->addColumn('action', function ($data) {
                    return view('admin.templates.index_actions', [
                        'id' => $data->id,
                        'route' => $this->route
                    ])->render();
                })
                ->rawColumns(['action', 'name'])
                ->make(true);
        }

        $info = $this->crudInfo();
        return view($this->indexResource(), $info);
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $info = $this->crudInfo();
        return view($this->createResource(), $info);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);
        $data = $request->all();
        $service = new Service($data);
        $service->save();
        if ($request->image) {
            $service->addMediaFromRequest('image')
                ->toMediaCollection();
        }
        return redirect()->route($this->indexRoute());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $info = $this->crudInfo();
        $info['item'] = Service::findOrFail($id);
        return view($this->showResource(), $info);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $info = $this->crudInfo();
        $info['item'] = Service::findOrFail($id);
        //        dd($info);
        return view($this->editResource(), $info);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',

        ]);
        $data = $request->all();
        $item = Service::findOrFail($id);
        $item->update($data);
        if ($request->image) {
            $item->clearMediaCollection();
            $item->addMediaFromRequest('image')
                ->toMediaCollection();
        }

        return redirect()->route($this->indexRoute());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('testimonials.delete')) {
            abort(403);
        }
        try {
            $item = Service::findOrFail($id);
            $item->clearMediaCollection();
            $item->delete();
        } catch (\Exception $e) {
            return redirect()->route($this->indexRoute());
        }
        return redirect()->route($this->indexRoute());
    }
}
