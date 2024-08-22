<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Upload;
use Illuminate\Http\Request;


class UploadController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Upload';
        $this->resources = 'uploader.';
        parent::__construct();
        $this->route = 'uploader.';
    }
    public function index()
    {

    }
    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {
        try {
            $data['status'] = true;
            $requestData = $request->all();
            $upload = new Upload($requestData);
            $upload->save();
            if ($request->file) {
                $upload->addMediaFromRequest('file')
                    ->toMediaCollection();
            }
            $data['data'] = $upload;
            $data['data']->url = $upload->getImage();
        } catch (\Exception $e) {
            $data['status'] = false;
        }
        return $data;
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
    }
    public function update($id, Request $request)
    {
        try {
            $data['status'] = true;
            $requestData = $request->all();
            $upload = new Upload($requestData);
            $upload->save();
            if ($request->file) {
                $upload->clearMediaCollection();
                $upload->addMediaFromRequest('file')
                    ->toMediaCollection();
            }
            $data['data'] = $upload;
            $data['data']->url = $upload->getImage();
        } catch (\Exception $e) {
            $data['status'] = false;
        }
        return $data;
    }

    public function destroy($id)
    {
        try {
            $data['status'] = true;
            $upload = Upload::findOrFail($id);
            $upload->clearMediaCollection();
            $upload->delete();
        } catch (\Exception $e) {
            $data['status'] = false;
        }
        return $data;
    }
}