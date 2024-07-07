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
        echo view('layout/topbar');
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

            $fileFoto = $this->request->getFile('foto');
            $fileFoto->move('img');
            $namaFoto = $fileFoto->getName();
            $data = [
                'jenis_makanan' => $jenis_makanan,
                'foto' => $namaFoto
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

    public function editKategori($id_jenis) {
        $jenis_makanan = $this->request->getPost('jenis_makanan');
        $foto = $this->request->getFile('foto');
    
        // Perform your database update logic here
        $data = [
            'jenis_makanan' => $jenis_makanan
        ];
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            // Move the file to the public/img directory
            $foto->move(FCPATH . 'img', $fotoName);
            $data['foto'] = $fotoName;
        }
    
        $model = new KategoriModel();
        $result = $model->update($id_jenis, $data);
    
        if ($result) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }
    

}
