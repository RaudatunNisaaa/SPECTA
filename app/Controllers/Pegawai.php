<?php

namespace App\Controllers;
use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    
    public function index()
    {
        $pegawaiModel = new PegawaiModel();
        $dataPegawai = $pegawaiModel->findAll();
        $data = [
            'pegawai' => $dataPegawai
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('owner/pegawai', $data);
        echo view('layout/footer');
    }

    public function login()
    {
        return view('login');
    }

}