<?php

namespace App\Controllers;
use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }
    
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

    public function tambahpegawai()
    {
        echo view('layout/topbar');
        echo view('layout/sidebar');
        echo view('owner/tambahpegawai');
        echo view('layout/footer');
    }

    public function simpanPegawai()
    {
        $pegawaiModel = new PegawaiModel();

        $data = [
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'phone' => $this->request->getPost('phone'),
            'alamat' => $this->request->getPost('alamat'),
            'tugas' => $this->request->getPost('tugas')
        ];
// var_dump($data);exit;
        $pegawaiModel->save($data);

        return redirect()->to('/pegawai');
    }

    public function hapusPegawai($id_pegawai)
    {
        $this->pegawaiModel->delete($id_pegawai);
        return $this->response->setJSON(['status' => 'success']);
    }

   public function editPegawai($id_pegawai)
{
    // Mengambil data dari permintaan POST
    $nama_pegawai = $this->request->getVar('nama_pegawai');
    $jenis_kelamin = $this->request->getVar('jenis_kelamin');
    $phone = $this->request->getVar('phone');
    $alamat = $this->request->getVar('alamat');
    $tugas = $this->request->getVar('tugas');

    // Membuat array data untuk disimpan
    $data = [
        'nama_pegawai' => $nama_pegawai,
        'jenis_kelamin' => $jenis_kelamin,
        'phone' => $phone,
        'alamat' => $alamat,
        'tugas' => $tugas
    ];

    // Memanggil model PegawaiModel
    $model = new PegawaiModel();
    
    // Memanggil fungsi update pada model untuk menyimpan data
    $result = $model->update($id_pegawai, $data);
    return redirect()->to('/pegawai');
    // Memeriksa apakah update berhasil
  
}


}