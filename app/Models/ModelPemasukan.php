<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPemasukan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pemasukan';
    protected $primaryKey       = 'id_pemasukan';
    protected $allowedFields    = ['tgl_pemasukan', 'jam_pemasukan', 'deposit_pemasukan', 'id_user'];

    public function pemasukanSekarang()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-' . date('m') . '-01');
        $builder->where('tgl_pemasukan <=', '2023-' . date('m') . '-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanLalu()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-' . date('m', strtotime('-1 month')) . '-01');
        $builder->where('tgl_pemasukan <=', '2023-' . date('m', strtotime('-1 month')) . '-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanSekarangUser($userid)
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-' . date('m') . '-01');
        $builder->where('tgl_pemasukan <=', '2023-' . date('m') . '-31');
        $builder->where('id_user', $userid);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanLaluUser($userid)
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-' . date('m', strtotime('-1 month')) . '-01');
        $builder->where('tgl_pemasukan <=', '2023-' . date('m', strtotime('-1 month')) . '-31');
        $builder->where('id_user', $userid);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukan1()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-01-01');
        $builder->where('tgl_pemasukan <=', '2023-01-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukan2()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-02-01');
        $builder->where('tgl_pemasukan <=', '2023-02-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }
    public function pemasukan3()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-03-01');
        $builder->where('tgl_pemasukan <=', '2023-03-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }
    public function pemasukan4()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-04-01');
        $builder->where('tgl_pemasukan <=', '2023-04-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }
    public function pemasukan5()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-05-01');
        $builder->where('tgl_pemasukan <=', '2023-05-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }
    public function pemasukan6()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-06-01');
        $builder->where('tgl_pemasukan <=', '2023-06-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }
    public function pemasukan7()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-07-01');
        $builder->where('tgl_pemasukan <=', '2023-07-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }
    public function pemasukan8()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-08-01');
        $builder->where('tgl_pemasukan <=', '2023-08-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }
    public function pemasukan9()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-09-01');
        $builder->where('tgl_pemasukan <=', '2023-09-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }
    public function pemasukan10()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-10-01');
        $builder->where('tgl_pemasukan <=', '2023-10-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }
    public function pemasukan11()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-11-01');
        $builder->where('tgl_pemasukan <=', '2023-11-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }
    public function pemasukan12()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-12-01');
        $builder->where('tgl_pemasukan <=', '2023-12-31');
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanIcan1()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-01-01');
        $builder->where('tgl_pemasukan <=', '2023-01-31');
        $builder->where('id_user', 1);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanIcan2()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-02-01');
        $builder->where('tgl_pemasukan <=', '2023-02-31');
        $builder->where('id_user', 1);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanIcan3()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-03-01');
        $builder->where('tgl_pemasukan <=', '2023-03-31');
        $builder->where('id_user', 1);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanIcan4()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-04-01');
        $builder->where('tgl_pemasukan <=', '2023-04-31');
        $builder->where('id_user', 1);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanIcan5()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-05-01');
        $builder->where('tgl_pemasukan <=', '2023-05-31');
        $builder->where('id_user', 1);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanIcan6()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-06-01');
        $builder->where('tgl_pemasukan <=', '2023-06-31');
        $builder->where('id_user', 1);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanIcan7()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-07-01');
        $builder->where('tgl_pemasukan <=', '2023-07-31');
        $builder->where('id_user', 1);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanIcan8()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-08-01');
        $builder->where('tgl_pemasukan <=', '2023-08-31');
        $builder->where('id_user', 1);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanIcan9()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-09-01');
        $builder->where('tgl_pemasukan <=', '2023-09-31');
        $builder->where('id_user', 1);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanIcan10()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-10-01');
        $builder->where('tgl_pemasukan <=', '2023-10-31');
        $builder->where('id_user', 1);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanIcan11()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-11-01');
        $builder->where('tgl_pemasukan <=', '2023-11-31');
        $builder->where('id_user', 1);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanIcan12()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-12-01');
        $builder->where('tgl_pemasukan <=', '2023-12-31');
        $builder->where('id_user', 1);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanVera1()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-01-01');
        $builder->where('tgl_pemasukan <=', '2023-01-31');
        $builder->where('id_user', 2);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanVera2()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-02-01');
        $builder->where('tgl_pemasukan <=', '2023-02-31');
        $builder->where('id_user', 2);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanVera3()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-03-01');
        $builder->where('tgl_pemasukan <=', '2023-03-31');
        $builder->where('id_user', 2);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanVera4()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-04-01');
        $builder->where('tgl_pemasukan <=', '2023-04-31');
        $builder->where('id_user', 2);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanVera5()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-05-01');
        $builder->where('tgl_pemasukan <=', '2023-05-31');
        $builder->where('id_user', 2);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanVera6()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-06-01');
        $builder->where('tgl_pemasukan <=', '2023-06-31');
        $builder->where('id_user', 2);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanVera7()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-07-01');
        $builder->where('tgl_pemasukan <=', '2023-07-31');
        $builder->where('id_user', 2);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanVera8()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-08-01');
        $builder->where('tgl_pemasukan <=', '2023-08-31');
        $builder->where('id_user', 2);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanVera9()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-09-01');
        $builder->where('tgl_pemasukan <=', '2023-09-31');
        $builder->where('id_user', 2);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanVera10()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-10-01');
        $builder->where('tgl_pemasukan <=', '2023-10-31');
        $builder->where('id_user', 2);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanVera11()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-11-01');
        $builder->where('tgl_pemasukan <=', '2023-11-31');
        $builder->where('id_user', 2);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function pemasukanVera12()
    {
        $builder = $this->db->table('pemasukan');
        $builder->selectSum('deposit_pemasukan');
        $builder->where('tgl_pemasukan >=', '2023-12-01');
        $builder->where('tgl_pemasukan <=', '2023-12-31');
        $builder->where('id_user', 2);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }
}
