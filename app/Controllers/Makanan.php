<?php

namespace App\Controllers;

use App\Models\MakananModel;
use App\Models\KategoriModel;

class Makanan extends BaseController
{
    protected $makananModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->makananModel = new MakananModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $dataKategori = $this->kategoriModel->findAll();
        $data = [
            'kategori' => $dataKategori
        ];

        echo view('menu', $data);
    }

    // public function menu()
    // {
    //     $makananModel = new MakananModel();
    //     $makanan = $makananModel->findAll();
    //     $data['makanan'] = count($makanan);

    //     $pesananModel = new PesananModel();
    //     $pesanan = $pesananModel->findAll();
    //     // var_dump('aa');exit;
    //     $data['pesanan'] = count($pesanan);

    //     // var_dump($jumlahMakanan);exit;
    //     return view('index', $data);
    // }

    public function detailmenu($id_jenis)
    {
        $dataKategori = $this->kategoriModel->findAll;
        $model = new MakananModel();
        $data = [
            'jenis' => $model->getJenis(),
            'makanan' => $this->makananModel->getMakanan($id_jenis),
            'id_jenis' => $id_jenis,
            'jenis_makanan' => $this->kategoriModel->where('id_jenis', $id_jenis)->first()
        ];
        // var_dump($data['makanan']);exit;
        echo view('detailmenu', $data);
        echo view('layout/footer');
    }

    public function pesan($id)
    {
        $data['pesan'] = $this->makananModel->join('jenismakanan','jenismakanan.id_jenis=makanan.id_jenis','left')->find($id);
// var_dump($data);exit;
        return view('pesan', $data);
    }

    public function datamenu($id_jenis)
    {
        $data = [
            'makanan' => $this->makananModel->getMakanan($id_jenis),
            'id_jenis' => $id_jenis
        ];
        echo view('layout/header');
        echo view('layout/menu');
        echo view('admin/datamenu', $data);
        echo view('layout/footer');
    }

    public function tambahmenu($id_jenis)
    {
        echo view('layout/topbar');
        echo view('layout/menu');
        echo view('admin/tambahmenu', ['id_jenis' => $id_jenis]);
        echo view('layout/footer');
    }

    public function datamakanan()
    {
        $data = [
            'makanan' => $this->makananModel->findAll(),
        ];
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('owner/datamakanan', $data);
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

            $fileFoto = $this->request->getFile('foto');
            $fileFoto->move('img');
            $namaFoto = $fileFoto->getName();
            $data = [
                'id_jenis' => $id_jenis,
                'makanan' => $makanan,
                'harga' => $harga,
                'foto' => $namaFoto
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

    public function editMenu($id_makanan) {
        $makanan = $this->request->getPost('makanan');
        $harga = $this->request->getPost('harga');
        $foto = $this->request->getFile('foto');
    
        $data = [
            'makanan' => $makanan,
            'harga' => $harga
        ];
    
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move(FCPATH . 'img', $fotoName);
            $data['foto'] = $fotoName;
        }
    
        $model = new MakananModel();
        $result = $model->update($id_makanan, $data);
    
        if ($result) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }
    
    
}
