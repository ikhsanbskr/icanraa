<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAgenda extends Model
{
  protected $DBGroup          = 'default';
  protected $table            = 'agenda';
  protected $primaryKey       = 'id';
  protected $allowedFields    = ['start_date', 'end_date', 'keterangan_agenda'];
}
