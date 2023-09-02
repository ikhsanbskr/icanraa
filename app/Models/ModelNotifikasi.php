<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNotifikasi extends Model
{
  protected $DBGroup          = 'default';
  protected $table            = 'notifikasi';
  protected $primaryKey       = 'id';
  protected $allowedFields    = ['pesan', 'tanggal', 'user_id', 'status'];
}
