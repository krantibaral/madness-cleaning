<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\Models\WindowsCleaningService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class WindowsCleaningServiceController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Windows Cleaning Service';
        $this->resources = 'admin.windows_cleaning_services.';
        $this->route = 'windows_cleaning_services.';
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = WindowsCleaningService::orderBy('id', 'DESC')->get();
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
        $windowsCleaningService = new WindowsCleaningService($data);
        $windowsCleaningService->save();

        if ($request->image) {
            $windowsCleaningService->addMediaFromRequest('image')
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
        $info['item'] = WindowsCleaningService::findOrFail($id);
        return view($this->showResource(), $info);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $info = $this->crudInfo();
        $info['item'] = WindowsCleaningService::findOrFail($id);
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
        $item = WindowsCleaningService::findOrFail($id);
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
        try {
            $item = WindowsCleaningService::findOrFail($id);
            $item->clearMediaCollection();
            $item->delete();
        } catch (\Exception $e) {
            return redirect()->route($this->indexRoute());
        }

        return redirect()->route($this->indexRoute());
    }
}
