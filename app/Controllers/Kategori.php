<?php

namespace App\Controllers;

use App\Models\KategoryModel;

class Kategori extends BaseController
{
    public function index()
    {
        $model = new KategoryModel();
        return view('pages/kategori/index', [
            'datas' => $model->orderBy('kategori_id', 'DESC')->findAll()
        ]);
    }

    public function create()
    {
        return view('pages/kategori/create');
    }

    public function store()
    {
        $model = new KategoryModel();
        $model->insert([
            'nama_kategori' => $this->request->getVar('nama_kategori'),
        ]);

        session()->setFlashdata('success', "Add Kategori Successfully");
        return $this->response->redirect(base_url('/admin/kategori'));
    }

    public function edit($id)
    {
        $model = new KategoryModel();

        return view('pages/kategori/edit', [
            'data' => $model->where('kategori_id', $id)->first(),
        ]);
    }

    public function update($id)
    {
        $model = new KategoryModel();

        $model->update($id, [
            'nama_kategori' => $this->request->getVar('nama_kategori'),
        ]);

        session()->setFlashdata('success', "Update Kategori Successfully");
        return $this->response->redirect(base_url('/admin/kategori'));
    }

    public function destroy($id)
    {
        $model = new KategoryModel();

        $model->where('kategori_id', $id)->delete($id);

        session()->setFlashdata('success', "Delete Kategori Successfully");
        return $this->response->redirect(base_url('/admin/kategori'));
    }
}
