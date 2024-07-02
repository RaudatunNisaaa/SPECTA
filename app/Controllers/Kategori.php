<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\MakananModel;

class Kategori extends BaseController
{
    protected $kategoriModel;
    protected $makananModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->makananModel = new MakananModel();
    }

    public function datakategori()
    {
        $dataKategori = $this->kategoriModel->findAll();
        $data = [
            'kategori' => $dataKategori
        ];
        echo view('layout/header');
        echo view('layout/menu');
        echo view('admin/datakategori', $data);
        echo view('layout/footer');
    }

    public function tambahkategori()
    {
        echo view('layout/header');
        echo view('layout/menu');
        echo view('admin/tambahkategori');
        echo view('layout/footer');
    }

    public function tambahKategoriMenu()
    {
        $jenis_makanan = $this->request->getPost('jenis_makanan');
        $foto = $this->request->getPost('foto');

        $rules = [
            'jenis_makanan' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ]);
        } else {
            $data = [
                'jenis_makanan' => $jenis_makanan,
                'foto' => $foto
            ];

            $this->kategoriModel->insert($data);

            return $this->response->setJSON([
                'status' => 'success'
            ]);
        }
    }

    public function hapusKategori($id_jenis)
    {
        $this->kategoriModel->delete($id_jenis);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function editKategori($id_jenis)
    {
        $input = $this->request->getJSON();

        if (!isset($input->jenis_makanan) || !isset($input->foto)) {
            return $this->respond(['status' => 'error', 'message' => 'Data tidak valid'], 400);
        }

        $data = [
            'jenis_makanan' => $input->jenis_makanan,
            'foto' => $input->foto
        ];
        if ($this->kategoriModel->update($id_jenis, $data)) {
            return $this->respond(['status' => 'success']);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'Gagal mengubah kategori'], 500);
        }
    }

    // public function detailKategori($id_jenis)
    // {
    //     $data = [
    //         'menu' => $this->makananModel->getMakanan($id_jenis)
    //     ];
    //     echo view('layout/header');
    //     echo view('layout/menu');
    //     echo view('datamenu', $data);
    //     echo view('layout/footer');
    // }
}
