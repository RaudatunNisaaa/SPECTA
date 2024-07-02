<?php

namespace App\Controllers;

use App\Models\PesananModel;

class checkout extends BaseController
{
    public function index(): string
    {
        return view('checkout');
    }

    public function process()
    {
        $data = [
            'id_makanan' => $this->request->getPost('id_makanan'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal_pengambilan' => $this->request->getPost('tanggal_pengambilan'),
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'phone' => $this->request->getPost('phone'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        $pesananModel = new PesananModel();
        if ($pesananModel->insert($data)) {
            return redirect()->to('/menu'); 
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }
}
