<?php

namespace App\Controllers;

use App\Models\AkunModel;
use CodeIgniter\Controller;

class Akun extends BaseController
{
    protected $akunModel;

    public function __construct()
    {
        $this->akunModel = new AkunModel();
    }

    public function index()
    {
        $akunModel = new AkunModel();
        $akun['akun'] = $akunModel->findAll();

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('owner/akun', $akun);
        echo view('layout/footer');
    }

    public function login()
    {
        return view('login');
    }

    public function tambah()
    {
        echo view('layout/topbar');
        echo view('layout/sidebar');
        echo view('owner/tambahakun');
        echo view('layout/footer');
    }

    public function simpan()
    {
        $akunModel = new AkunModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level')
        ];

        $akunModel->save($data);

        return redirect()->to('/akun');
    }

    public function hapusAkun($id_akun)
    {
        $this->akunModel->delete($id_akun);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function editAkun($id_akun)
    {
        $input = $this->request->getJSON();

        if (!isset($input->username) || !isset($input->password) || !isset($input->level)) {
            return $this->respond(['status' => 'error', 'message' => 'Data tidak valid'], 400);
        }

        $data = [
            'username' => $input->username,
            'password' => $input->password,
            'level' => $input->level
        ];

        if ($this->akunModel->update($id_akun, $data)) {
            return $this->respond(['status' => 'success']);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'Gagal mengubah akun'], 500);
        }
    }
}
