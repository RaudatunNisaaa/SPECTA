<?php

namespace App\Controllers;
use App\Models\PesananModel;
use APP\Models\MakananModel;
use App\Models\AkunModel;
use App\Models\PegawaiModel;
use App\Models\makanan_m;

class Home extends BaseController
{
    public function index(): string //dashboard admin
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

    public function owner() //dashboar owner
    {
        $pesananModel = new PesananModel();
        $pesanan = $pesananModel->findAll();
        $data['pesanan']=count($pesanan);
        $akunModel = new AkunModel();
        $akun = $akunModel->findAll();
        $data['akun']=count($akun);
        $pegawaiModel = new PegawaiModel();
        $pegawai = $pegawaiModel->findAll();
        $data['pegawai']=count($pegawai);
        $makanan_m = new makanan_m();
        $makanan = $makanan_m->findAll();
        $data['makanan'] = count($makanan);

        echo view('layout/sidebar');
        return view('owner/index', $data);
        echo view('layout/footer');
    }

    public function beranda() //beranda pelanggan
    {
        return view('beranda');
    }

}
