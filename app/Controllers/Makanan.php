<?php

namespace App\Controllers;

use App\Models\MakananModel;

class Makanan extends BaseController
{
    protected $makananModel;

    public function __construct()
    {
        $this->makananModel = new MakananModel();
    }

    public function datamenu($id_jenis)
    {
        $data = [
            'makanan' => $this->makananModel->getMakanan($id_jenis),
            'id_jenis' => $id_jenis
        ];
        echo view('layout/header');
        echo view('layout/menu');
        echo view('datamenu', $data);
        echo view('layout/footer');
    }

    public function tambahmenu($id_jenis)
    {
        echo view('layout/header');
        echo view('layout/menu');
        echo view('tambahmenu', ['id_jenis' => $id_jenis]);
        echo view('layout/footer');
    }

    public function tambahDataMenu()
    {
        $makanan = $this->request->getPost('makanan');
        $harga = $this->request->getPost('harga');
        $foto = $this->request->getPost('foto');
        $id_jenis = $this->request->getPost('id_jenis');

        $rules = [
            'makanan' => 'required',
            'harga' => 'required|numeric',
        ];

        $errors = [
            'harga' => [
                'numeric' => 'Harga harus berupa angka.'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ]);
        } else {
            $data = [
                'id_jenis' => $id_jenis,
                'makanan' => $makanan,
                'harga' => $harga,
                'foto' => $foto
            ];

            $this->makananModel->insert($data);

            return $this->response->setJSON([
                'status' => 'success',
                'id_jenis' => $id_jenis
            ]);
        }
    }

    public function hapusMenu($id_makanan)
    {
        $this->makananModel->delete($id_makanan);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function editMenu($id_makanan)
    {
        $input = $this->request->getJSON();

        if (!isset($input->makanan) || !isset($input->harga) || !isset($input->foto)) {
            return $this->respond(['status' => 'error', 'message' => 'Data tidak valid'], 400);
        }

        $data = [
            'makanan' => $input->makanan,
            'harga' => $input->harga,
            'foto' => $input->foto
        ];
        if ($this->makananModel->update($id_makanan, $data)) {
            return $this->respond(['status' => 'success']);
        } else {
            return $this->respond(['status' => 'error', 'message' => 'Gagal mengubah menu'], 500);
        }
    }

}
