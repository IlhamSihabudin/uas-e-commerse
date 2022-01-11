<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';

    protected $primaryKey = 'produk_id';

    protected $allowedFields = [
        'nama_produk',
        'harga',
        'kategori_id',
        'merek_id',
        'created_at'
    ];

    public function getKategoriMerek()
    {
        return $this->db->table('produk')
            ->join('kategori_produk', 'produk.kategori_id = kategori_produk.kategori_id')
            ->join('merek', 'produk.merek_id = merek.merek_id')
            ->orderBy('produk_id', 'DESC')
            ->get()->getResult();
    }
}