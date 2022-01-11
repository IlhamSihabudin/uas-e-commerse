<?php

namespace App\Controllers;

use App\Models\KategoryModel;
use App\Models\MerekModel;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    public function index()
    {
        $model = new ProdukModel();
        return view('pages/produk/index', [
            'datas' => $model->getKategoriMerek()
        ]);
    }

    public function create()
    {
        $kategori = new KategoryModel();
        $merek = new MerekModel();
        return view('pages/produk/create', [
            'kategoris' => $kategori->findAll(),
            'mereks' => $merek->findAll(),
        ]);
    }

    public function store()
    {
        $model = new ProdukModel();
        $model->insert([
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga'),
            'kategori_id' => $this->request->getVar('kategori_id'),
            'merek_id' => $this->request->getVar('merek_id'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('success', "Add Produk Successfully");
        return $this->response->redirect(base_url('/admin/produk'));
    }

    public function edit($id)
    {
        $kategori = new KategoryModel();
        $merek = new MerekModel();
        $model = new ProdukModel();

        return view('pages/produk/edit', [
            'data' => $model->where('produk_id', $id)->first(),
            'kategoris' => $kategori->findAll(),
            'mereks' => $merek->findAll(),
        ]);
    }

    public function update($id)
    {
        $model = new ProdukModel();

        $model->update($id, [
            'nama_produk' => $this->request->getVar('nama_produk'),
        ]);

        session()->setFlashdata('success', "Update Produk Successfully");
        return $this->response->redirect(base_url('/admin/produk'));
    }

    public function destroy($id)
    {
        $model = new ProdukModel();

        $model->where('produk_id', $id)->delete($id);

        session()->setFlashdata('success', "Delete Produk Successfully");
        return $this->response->redirect(base_url('/admin/produk'));
    }
}
