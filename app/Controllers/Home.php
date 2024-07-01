<?php

namespace App\Controllers;
use App\Models\PesananModel;

class Home extends BaseController
{
    public function index(): string
    {
        $pesananModel = new PesananModel();
        $tunggu = $pesananModel->where('status', 'Tunggu')->findAll();
        $data['tunggu'] = count($tunggu);
        $disetujui = $pesananModel->where('status', 'Disetujui')->findAll();
        $data['disetujui'] = count($disetujui);
        $selesai = $pesananModel->where('status', 'Selesai')->findAll();
        $data['selesai'] = count($selesai);
        $dibatalkan = $pesananModel->where('status', 'Dibatalkan')->findAll();
        $data['dibatalkan'] = count($dibatalkan);

        echo view('layout/menu');
        return view('index', $data);
        echo view('layout/footer');
    }

    public function login()
    {
        return view('login');
    }

    public function persetujuan()
    {
        $pesananModel = new PesananModel();
        $tunggu = $pesananModel->where('status', 'Tunggu')->findAll();
        $data['tunggu'] = $tunggu;
        echo view('layout/header');
        echo view('layout/menu');
        return view('persetujuan',$data);
        echo view('layout/footer');
    }

    public function disetujui()
    {
        $pesananModel = new PesananModel();
        $disetujui = $pesananModel->where('status', 'Disetujui')->findAll();
        $data['disetujui'] = $disetujui;
        echo view('layout/header');
        echo view('layout/menu');
        return view('disetujui', $data);
        echo view('layout/footer');
    }

    public function selesai()
    {
        $pesananModel = new PesananModel();
        $selesai = $pesananModel->where('status', 'Selesai')->findAll();
        $data['selesai'] = $selesai;
        echo view('layout/header');
        echo view('layout/menu');
        return view('selesai', $data);
        echo view('layout/footer');
    }

    public function dibatalkan()
    {
        $pesananModel = new PesananModel();
        $dibatalkan = $pesananModel->where('status', 'Dibatalkan')->findAll();
        $data['dibatalkan'] = $dibatalkan;
        echo view('layout/header');
        echo view('layout/menu');
        return view('dibatalkan', $data);
        echo view('layout/footer');
    }
}
