<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCelengan extends Model
{
  protected $DBGroup          = 'default';
  protected $table            = 'celengan';
  protected $primaryKey       = 'id';
  protected $allowedFields    = ['tgl_transaksi', 'jam_transaksi', 'nominal_transaksi', 'keterangan', 'status'];

  public function pemasukanSekarang()
  {
    $builder = $this->db->table('celengan');
    $builder->selectSum('nominal_transaksi');
    $builder->where('tgl_transaksi >=', '2023-' . date('m') . '-01');
    $builder->where('tgl_transaksi <=', '2023-' . date('m') . '-31');
    $builder->where('status', 'deposit');
    $query = $builder->get();
    return $query->getFirstRow('array');
  }

  public function pemasukanLalu()
  {
    $builder = $this->db->table('celengan');
    $builder->selectSum('nominal_transaksi');
    $builder->where('tgl_transaksi >=', '2023-' . date('m', strtotime('-1 month')) . '-01');
    $builder->where('tgl_transaksi <=', '2023-' . date('m', strtotime('-1 month')) . '-31');
    $builder->where('status', 'deposit');
    $query = $builder->get();
    return $query->getFirstRow('array');
  }
}
