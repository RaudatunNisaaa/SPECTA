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
        $input = $this->request->getJSON();

        if (!isset($input->nama_pegawai) || !isset($input->jenis_kelamin) || !isset($input->phone) || !isset($input->alamat) || !isset($input->tugas)) {
            return $this->respond(['status' => 'error', 'message' => 'Data tidak valid'], 400);
        }

        $data = [
            'nama_pegawai' => $input->nama_pegawai,
            'jenis_kelamin' => $input->jenis_kelamin,
            'phone' => $input->phone,
            'alamat' => $input->alamat,
            'tugas' => $input->tugas
        ];

        if ($this->pegawaiModel->update($id_pegawai, $data)) {
            return $this->respond(['status' => 'success']);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'Gagal mengubah akun'], 500);
        }
    }

}