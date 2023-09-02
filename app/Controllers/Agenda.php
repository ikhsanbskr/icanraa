<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAgenda;
use App\Models\ModelSaldo;

class Agenda extends BaseController
{
    protected $modelAgenda, $modelSaldo;
    public function __construct()
    {
        $this->modelSaldo = new ModelSaldo();
        $this->modelAgenda = new ModelAgenda();
    }
    public function index()
    {
        $data = [
            'saldo' => $this->modelSaldo->first()
        ];
        return view('/agenda/index', $data);
    }

    public function getAgenda()
    {
        header('Content-Type: application/json');
        $start = $this->request->getGet('start');
        $end = $this->request->getGet('end');

        $data = $this->modelAgenda->where('start_date', $start)->where('end_date', $end)->findAll();

        $jsonEncode = json_encode($data);

        if ($data) {
            echo json_encode([
                'code'  => '200',
                'status' => 'success',
                'data' => json_decode($jsonEncode)
            ]);
        } else {
            echo json_encode([
                'code'  => '404',
                'status' => 'failed',
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }
}
