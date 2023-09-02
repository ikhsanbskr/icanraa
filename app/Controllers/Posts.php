<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSaldo;

class Posts extends BaseController
{
    protected $modelSaldo;
    public function __construct()
    {
        $this->modelSaldo = new ModelSaldo();
    }

    public function index()
    {
        $data = [
            'saldo' => $this->modelSaldo->first()
        ];
        return view('/posts/index', $data);
    }
}
