<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSaldo extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'saldo';
    protected $primaryKey       = 'id_saldo';
    protected $allowedFields    = ['isi_saldo'];
}
