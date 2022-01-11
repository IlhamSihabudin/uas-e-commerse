<?php

namespace App\Controllers;

use App\Models\MerekModel;

class Merek extends BaseController
{
    public function index()
    {
        $model = new MerekModel();
        return view('pages/merek/index', [
            'datas' => $model->orderBy('merek_id', 'DESC')->findAll()
        ]);
    }

    public function create()
    {
        return view('pages/merek/create');
    }

    public function store()
    {
        $model = new MerekModel();
        $model->insert([
            'nama_merek' => $this->request->getVar('nama_merek'),
        ]);

        session()->setFlashdata('success', "Add Merek Successfully");
        return $this->response->redirect(base_url('/admin/merek'));
    }

    public function edit($id)
    {
        $model = new MerekModel();
        
        return view('pages/merek/edit', [
            'data' => $model->where('merek_id', $id)->first(),
        ]);
    }

    public function update($id)
    {
        $model = new MerekModel();

        $model->update($id, [
            'nama_merek' => $this->request->getVar('nama_merek'),
        ]);

        session()->setFlashdata('success', "Update Merek Successfully");
        return $this->response->redirect(base_url('/admin/merek'));
    }

    public function destroy($id)
    {
        $model = new MerekModel();

        $model->where('merek_id', $id)->delete($id);

        session()->setFlashdata('success', "Delete Merek Successfully");
        return $this->response->redirect(base_url('/admin/merek'));
    }
}
