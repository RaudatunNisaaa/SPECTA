<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\HistoryModel;

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
            'status' => 'Tunggu',
        ];

        $pesananModel = new PesananModel();
        if ($pesananModel->insert($data)) {
            $id_pesanan = $pesananModel->getInsertID();
            // var_dump($id_pesanan);exit;
            $historyModel = new HistoryModel();
            $historyData = [
                'id_pesanan' => $id_pesanan,
                'id_makanan' => $data['id_makanan'],
                'id_akun' => session()->get('id_akun'), // Assuming there's a session variable for user ID
                'nama_pelanggan' => $data['nama_pelanggan'],
                'phone' => $data['phone'],
                'jumlah' => $data['jumlah'],
                'tglAmbil' => $data['tanggal_pengambilan'],
                'alamat' => $data['alamat'],
                'status' => 'Tunggu', // Default status for new orders
            ];
            // var_dump($historyData);exit;
            $historyModel->insert($historyData);
            // var_dump('a');exit;
            return redirect()->to('/menu'); 
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }

        $pesananModel->where('id_pesanan', $id_pesanan)->set('status', 'Tunggu')->update();
    }

    
}
