<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoryModel extends Model
{
    protected $table = 'kategori_produk';

    protected $primaryKey = 'kategori_id';

    protected $allowedFields = [
        'nama_kategori'
    ];
}