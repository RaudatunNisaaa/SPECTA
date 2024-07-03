<?php

namespace App\Controllers;

use App\Models\HistoryModel;

class History extends BaseController
{
    protected $historyModel;

    public function __construct()
    {
        $this->historyModel = new HistoryModel();
    }

    public function index()
    {
        $dataHistory = $this->historyModel->findAll();
        $data = [
            'history' => $dataHistory
        ];
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('owner/history', $data);
        echo view('layout/footer');
    }

}
