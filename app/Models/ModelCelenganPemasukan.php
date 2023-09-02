<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCelenganPemasukan extends Model
{
  protected $DBGroup          = 'default';
  protected $table            = 'celengan_pemasukan';
  protected $primaryKey       = 'id';
  protected $allowedFields    = ['tgl_pemasukkan', 'jam_pemasukkan', 'deposit_pemasukkan'];
}
