<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengeluaran extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengeluaran';
    protected $primaryKey       = 'id_pengeluaran';
    protected $allowedFields    = ['tgl_pengeluaran', 'jam_pengeluaran', 'tarik_pengeluaran', 'keterangan', 'lokasi'];

    public function pengeluaranSekarang()
    {
        $builder = $this->db->table('pengeluaran');
        $builder->selectSum('tarik_pengeluaran');
        $builder->where('tgl_pengeluaran >=', '2023-' . date('m') . '-01');
        $builder->where('tgl_pengeluaran <=', '2023-' . date('m') . '-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pengeluaranLalu()
    {
        $builder = $this->db->table('pengeluaran');
        $builder->selectSum('tarik_pengeluaran');
        $builder->where('tgl_pengeluaran >=', '2023-' . date('m', strtotime('-1 month')) . '-01');
        $builder->where('tgl_pengeluaran <=', '2023-' . date('m', strtotime('-1 month')) . '-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }
}
