<?php

namespace App\Controllers;

use App\Models\ModelCelenganPemasukan;
use App\Models\ModelCelenganPemasukkan;
use App\Models\ModelPemasukan;
use App\Models\ModelPengeluaran;
use App\Models\ModelSaldo;

class Keuangan extends BaseController
{
    protected $modelPemasukan, $modelSaldo, $modelPengeluaran, $modelCelenganPemasukan;
    public function __construct()
    {
        $this->modelPemasukan         = new ModelPemasukan();
        $this->modelSaldo             = new ModelSaldo();
        $this->modelPengeluaran       = new ModelPengeluaran();
        $this->modelCelenganPemasukan = new ModelCelenganPemasukan();
    }

    public function index()
    {
        $data = [
            'title'             => 'Halaman Dashboard',
            'saldo'             => $this->modelSaldo->first(),
            'pengeluaran'       => $this->modelPengeluaran->selectSum('tarik_pengeluaran')->first(),
            'pemasukan_vera'    => $this->modelPemasukan
                ->where('id_user', 2)->selectSum('deposit_pemasukan')
                ->first(),
            'pemasukan_ikhsan'  => $this->modelPemasukan
                ->where('id_user', 1)->selectSum('deposit_pemasukan')
                ->first(),
            'pemasukan1'        => $this->modelPemasukan->pemasukan1(),
            'pemasukan2'        => $this->modelPemasukan->pemasukan2(),
            'pemasukan3'        => $this->modelPemasukan->pemasukan3(),
            'pemasukan4'        => $this->modelPemasukan->pemasukan4(),
            'pemasukan5'        => $this->modelPemasukan->pemasukan5(),
            'pemasukan6'        => $this->modelPemasukan->pemasukan6(),
            'pemasukan7'        => $this->modelPemasukan->pemasukan7(),
            'pemasukan8'        => $this->modelPemasukan->pemasukan8(),
            'pemasukan9'        => $this->modelPemasukan->pemasukan9(),
            'pemasukan10'       => $this->modelPemasukan->pemasukan10(),
            'pemasukan11'       => $this->modelPemasukan->pemasukan11(),
            'pemasukan12'       => $this->modelPemasukan->pemasukan12(),
            'pemasukan_ican1'   => $this->modelPemasukan->pemasukanIcan1(),
            'pemasukan_ican2'   => $this->modelPemasukan->pemasukanIcan2(),
            'pemasukan_ican3'   => $this->modelPemasukan->pemasukanIcan3(),
            'pemasukan_ican4'   => $this->modelPemasukan->pemasukanIcan4(),
            'pemasukan_ican5'   => $this->modelPemasukan->pemasukanIcan5(),
            'pemasukan_ican6'   => $this->modelPemasukan->pemasukanIcan6(),
            'pemasukan_ican7'   => $this->modelPemasukan->pemasukanIcan7(),
            'pemasukan_ican8'   => $this->modelPemasukan->pemasukanIcan8(),
            'pemasukan_ican9'   => $this->modelPemasukan->pemasukanIcan9(),
            'pemasukan_ican10'  => $this->modelPemasukan->pemasukanIcan10(),
            'pemasukan_ican11'  => $this->modelPemasukan->pemasukanIcan11(),
            'pemasukan_ican12'  => $this->modelPemasukan->pemasukanIcan12(),
            'pemasukan_vera1'   => $this->modelPemasukan->pemasukanVera1(),
            'pemasukan_vera2'   => $this->modelPemasukan->pemasukanVera2(),
            'pemasukan_vera3'   => $this->modelPemasukan->pemasukanVera3(),
            'pemasukan_vera4'   => $this->modelPemasukan->pemasukanVera4(),
            'pemasukan_vera5'   => $this->modelPemasukan->pemasukanVera5(),
            'pemasukan_vera6'   => $this->modelPemasukan->pemasukanVera6(),
            'pemasukan_vera7'   => $this->modelPemasukan->pemasukanVera7(),
            'pemasukan_vera8'   => $this->modelPemasukan->pemasukanVera8(),
            'pemasukan_vera9'   => $this->modelPemasukan->pemasukanVera9(),
            'pemasukan_vera10'  => $this->modelPemasukan->pemasukanVera10(),
            'pemasukan_vera11'  => $this->modelPemasukan->pemasukanVera11(),
            'pemasukan_vera12'  => $this->modelPemasukan->pemasukanVera12(),
        ];

        return view('/dashboard/index', $data);
    }

    public function deposit()
    {
        // Persentase Peningkatan Dari Bulan Lalu
        $pemasukan_lalu     = $this->modelPemasukan->pemasukanLalu();
        $pemasukan_ini      = $this->modelPemasukan->pemasukanSekarang();
        $jml_peningkatan    = intval($pemasukan_ini['deposit_pemasukan']) - intval($pemasukan_lalu['deposit_pemasukan']);

        if (intval($pemasukan_lalu['deposit_pemasukan']) <= 0) {
            $persen_peningkatan = 0;
        } else {
            $persen_peningkatan = $jml_peningkatan / intval($pemasukan_lalu['deposit_pemasukan']);
        }


        // Persentase Peningkatan Dari Bulan Lalu User
        $pemasukan_ini_user         = $this->modelPemasukan->pemasukanSekarangUser(user_id());
        $pemasukan_lalu_user        = $this->modelPemasukan->pemasukanLaluUser(user_id());
        $jml_peningkatan_user       = intval($pemasukan_ini_user['deposit_pemasukan']) - intval($pemasukan_lalu_user['deposit_pemasukan']);

        if (intval($pemasukan_lalu_user['deposit_pemasukan']) <= 0) {
            $persen_peningkatan_user = 0;
        } else {
            $persen_peningkatan_user    = $jml_peningkatan_user / intval($pemasukan_lalu_user['deposit_pemasukan']);
        }

        // Lempar View
        $persen_pemasukan =
            $data = [
                'title'             => 'Tabungan Deposit',
                'deposit'           => $this->modelPemasukan
                    ->join('users', 'users.id = pemasukan.id_user')
                    ->orderBy('tgl_pemasukan DESC, jam_pemasukan DESC')
                    ->findAll(),
                'pemasukan'         => $this->modelPemasukan->where('id_user', user_id())->selectSum('deposit_pemasukan')->first(),
                'saldo'             => $this->modelSaldo->first(),
                'peningkatan'       => $persen_peningkatan,
                'peningkatan_user'  => $persen_peningkatan_user
            ];

        return view('/tabungan/deposit', $data);
    }

    public function tambahDeposit()
    {
        // if (!$this->validate([
        //     'nominal_deposit' => [
        //         'rules'     => 'greater_than_equal_to[100]',
        //         'errors'    => [
        //             'greater_than_equal_to' => 'Minimal nominal adalah Rp100.'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->back()->withInput();
        // }

        $pemasukan = preg_replace('/\D/', "", $this->request->getVar('nominal_deposit'));
        $data = [
            'tgl_pemasukan'     => date('Y-m-d'),
            'jam_pemasukan'     => date('H:i:s'),
            'deposit_pemasukan' => $pemasukan,
            'id_user'           => user()->id
        ];
        $this->modelPemasukan->save($data);

        $saldo = $this->modelSaldo->first();
        $saldo_baru = intval($saldo['isi_saldo']) + intval($pemasukan);
        $dataSaldo = [
            'id_saldo'  => 1,
            'isi_saldo' => $saldo_baru
        ];
        $this->modelSaldo->save($dataSaldo);

        session()->setFlashdata('pesan', 'Deposit Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function pengeluaran()
    {
        // Persentase Pemasukan Dari Bulan Lalu
        $pemasukan_lalu     = $this->modelPemasukan->pemasukanLalu();
        $pemasukan_ini      = $this->modelPemasukan->pemasukanSekarang();
        $jml_peningkatan    = intval($pemasukan_ini['deposit_pemasukan']) - intval($pemasukan_lalu['deposit_pemasukan']);

        if (intval($pemasukan_lalu['deposit_pemasukan']) <= 0) {
            $persen_peningkatan = 0;
        } else {
            $persen_peningkatan = $jml_peningkatan / intval($pemasukan_lalu['deposit_pemasukan']);
        }

        // Persentasi Pengeluaran Dari Bulan Lalu
        $pengeluaran_lalu   = $this->modelPengeluaran->pengeluaranLalu();
        $pengeluaran_ini    = $this->modelPengeluaran->pengeluaranSekarang();
        $jml_pengeluaran    = intval($pengeluaran_ini['tarik_pengeluaran']) - intval($pengeluaran_lalu['tarik_pengeluaran']);

        if (intval($pengeluaran_lalu['tarik_pengeluaran']) <= 0) {
            $persen_pengeluaran = 0;
        } else {
            $persen_pengeluaran = $jml_pengeluaran / intval($pengeluaran_lalu['tarik_pengeluaran']);
        }

        // Lempar View
        $data = [
            'title'                     => 'Pengeluaran',
            'pengeluaran'               => $this->modelPengeluaran
                ->orderBy('tgl_pengeluaran DESC, jam_pengeluaran DESC')
                ->findAll(),
            'saldo'                     => $this->modelSaldo->first(),
            'jml_pengeluaran'           => $this->modelPengeluaran->selectSum('tarik_pengeluaran')->first(),
            'peningkatan_saldo'         => $persen_peningkatan,
            'peningkatan_pengeluaran'   => $persen_pengeluaran
        ];

        return view('/tabungan/pengeluaran', $data);
    }

    public function tambahPengeluaran()
    {
        $pengeluaran = preg_replace('/\D/', "", $this->request->getVar('nominal_pengeluaran'));

        if ($this->request->getVar('lokasi') == '') {
            $lokasi = "Tidak Diketahui";
        } else {
            $lokasi = $this->request->getVar('lokasi');
        }

        $data = [
            'tgl_pengeluaran'   => date('Y-m-d'),
            'jam_pengeluaran'   => date('H:i:s'),
            'tarik_pengeluaran' => $pengeluaran,
            'keterangan'        => $this->request->getVar('keterangan'),
            'lokasi'            => $lokasi
        ];
        $this->modelPengeluaran->save($data);

        $saldo      = $this->modelSaldo->first();
        $saldo_baru = intval($saldo['isi_saldo']) - intval($pengeluaran);

        $dataSaldo = [
            'id_saldo'  => 1,
            'isi_saldo' => $saldo_baru
        ];
        $this->modelSaldo->save($dataSaldo);

        session()->setFlashdata('pesan', 'Pengeluaran Berhasil Dicatat.');
        return redirect()->back();
    }

    public function celenganPemasukan()
    {
        $data = [
            'title'     => 'Celengan Pemasukan',
            'saldo'     => $this->modelSaldo->first(),
            'deposit'   => $this->modelCelenganPemasukan
                ->orderBy('tgl_pemasukan DESC, jam_pemasukan DESC')
                ->findAll(),
        ];

        return view('/celengan/pemasukan', $data);
    }
}
