<?php

namespace App\Controllers;
use App\Models\PesananModel;
use APP\Models\MakananModel;
use App\Models\AkunModel;
use App\Models\PegawaiModel;

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
        return view('admin/index', $data);
        echo view('layout/footer');
    }

    public function owner()
    {
        $makananModel = new MakananModel();
        $makanan = $makananModel->findAll();
        $data['makanan']=count($makanan);

        $akunModel = new AkunModel();
        $akun = $akunModel->findAll();
        $data['akun']=count($akun);

        $pesananModel = new PesananModel();
        $pesanan = $pesananModel->findAll();
        $data['pesanan']=count($pesanan);

        $pegawaiModel = new PegawaiModel();
        $pegawai = $pegawaiModel->findAll();
        $data['pegawai']=count($pegawai);
        
        echo view('layout/sidebar');
        return view('owner/index', $data);
        echo view('layout/footer');
    }

    public function menu()
    {
        $makananModel = new MakananModel();
        $makanan = $makananModel->findAll();
        $data['makanan'] = count($makanan);

        $pesananModel = new PesananModel();
        $pesanan = $pesananModel->findAll();
        // var_dump('aa');exit;
        $data['pesanan'] = count($pesanan);

        // var_dump($jumlahMakanan);exit;
        echo view('temp/header');
        echo view('temp/menu');
        return view('index', $data);
        echo view('temp/footer');
    }

    public function beranda()
    {
        return view('beranda');
    }

    public function login()
    {
        return view('admin/login');
    }

    public function persetujuan()
    {
        $pesananModel = new PesananModel();
        $tunggu = $pesananModel->where('status', 'Tunggu')->findAll();
        $data['tunggu'] = $tunggu;
        echo view('layout/header');
        echo view('layout/menu');
        return view('admin/persetujuan',$data);
        echo view('layout/footer');
    }

    public function disetujui()
    {
        $pesananModel = new PesananModel();
        $disetujui = $pesananModel->where('status', 'Disetujui')->findAll();
        $data['disetujui'] = $disetujui;
        echo view('layout/header');
        echo view('layout/menu');
        return view('admin/disetujui', $data);
        echo view('layout/footer');
    }

    public function selesai()
    {
        $pesananModel = new PesananModel();
        $selesai = $pesananModel->where('status', 'Selesai')->findAll();
        $data['selesai'] = $selesai;
        echo view('layout/header');
        echo view('layout/menu');
        return view('admin/selesai', $data);
        echo view('layout/footer');
    }

    public function dibatalkan()
    {
        $pesananModel = new PesananModel();
        $dibatalkan = $pesananModel->where('status', 'Dibatalkan')->findAll();
        $data['dibatalkan'] = $dibatalkan;
        echo view('layout/header');
        echo view('layout/menu');
        return view('admin/dibatalkan', $data);
        echo view('layout/footer');
    }
}
