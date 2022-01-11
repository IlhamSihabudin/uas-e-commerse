<?php

namespace App\Models;

use CodeIgniter\Model;

class MerekModel extends Model
{
    protected $table = 'merek';

    protected $primaryKey = 'merek_id';

    protected $allowedFields = [
        'nama_merek'
    ];
}