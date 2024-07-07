<?php

namespace App\Controllers;
use App\Models\PesananModel;
use App\Models\HistoryModel;

class Pesanan extends BaseController
{

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

    public function persetujuan()
    {
        $pesananModel = new PesananModel();
        $tunggu = $pesananModel->where('status', 'Tunggu')->findAll();
        $data['tunggu'] = $tunggu;
        echo view('layout/header');
        echo view('layout/menu');
        return view('admin/persetujuan',$data);
        echo view('layout/footer');
    }

    public function disetujui()
    {
        $pesananModel = new PesananModel();
        $disetujui = $pesananModel->where('status', 'Disetujui')->findAll();
        $data['disetujui'] = $disetujui;
        echo view('layout/header');
        echo view('layout/menu');
        return view('admin/disetujui', $data);
        echo view('layout/footer');
    }

    public function selesai()
    {
        $pesananModel = new PesananModel();
        $selesai = $pesananModel->where('status', 'Selesai')->findAll();
        $data['selesai'] = $selesai;
        echo view('layout/header');
        echo view('layout/menu');
        return view('admin/selesai', $data);
        echo view('layout/footer');
    }

    public function dibatalkan()
    {
        $pesananModel = new PesananModel();
        $dibatalkan = $pesananModel->where('status', 'Dibatalkan')->findAll();
        $data['dibatalkan'] = $dibatalkan;
        echo view('layout/header');
        echo view('layout/menu');
        return view('admin/dibatalkan', $data);
        echo view('layout/footer');
    }

    public function datapesanan()
    {
        $pesananModel = new PesananModel();
        $data = [
            'pesanan' => $this->pesananModel->findAll(),
        ];
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('owner/datapesanan', $data);
        echo view('layout/footer');
    }

    public function getStatus()
    {
        $pesananModel = new PesananModel();
        $data = $pesananModel->getStatusCounts();

        if ($data) {
            return $this->response->setJSON([
                'status' => true,
                'data' => $data
            ]);
        } else {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Data tidak exists'
            ]);
        }
    }

    public function updateStatus($id)
    {
        // $id = $this->request->getVar('id');
        $status = "Disetujui";
        $model = new PesananModel();
        
        // var_dump($waUrl);exit;
        // exit();
       

        $data = ['status' => $status];
        $abc = $model->update($id, $data);
        $orderDetails = $model->find($id); // Fetching order details
        $namaPelanggan = $orderDetails['nama_pelanggan']; // Assuming 'nama_pelanggan' is the field for customer's name
        $waMessage = "Pesanan atas nama $namaPelanggan telah $status.";
        $phone = $orderDetails['phone']; // Using fetched order details
        $waUrl = "https://api.whatsapp.com/send?phone=$phone&text=" . urlencode($waMessage);
        header("Location: $waUrl");
        exit;
        if ($abc) {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Status berhasil diubah'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Gagal mengubah status'
            ]);
        }
    }

    public function updateStatusTolak($id)
    {
        // $id = $this->request->getVar('id');
        $status = "Dibatalkan";
        $model = new PesananModel();
        
        // var_dump($waUrl);exit;
        // exit();
       

        $data = ['status' => $status];
        $abc = $model->update($id, $data);
        $orderDetails = $model->find($id); // Fetching order details
        $namaPelanggan = $orderDetails['nama_pelanggan']; // Assuming 'nama_pelanggan' is the field for customer's name
        $waMessage = "Mohon Maaf, Pesanan atas nama $namaPelanggan telah $status karena pesanan sudah full.";
        $phone = $orderDetails['phone']; // Using fetched order details
        $waUrl = "https://api.whatsapp.com/send?phone=$phone&text=" . urlencode($waMessage);
        header("Location: $waUrl");
        exit;
        if ($abc) {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Status berhasil diubah'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Gagal mengubah status'
            ]);
        }
    }


    public function updateStatusSelesai($id)
    {
        // $id = $this->request->getVar('id');
        $status = "Selesai";
        $model = new PesananModel();
        
        // var_dump($waUrl);exit;
        // exit();
       

        $data = ['status' => $status];
        $abc = $model->update($id, $data);
        $orderDetails = $model->find($id); // Fetching order details
        $namaPelanggan = $orderDetails['nama_pelanggan']; // Assuming 'nama_pelanggan' is the field for customer's name
        $waMessage = "Pesanan atas nama $namaPelanggan telah $status.";
        $phone = $orderDetails['phone']; // Using fetched order details
        $waUrl = "https://api.whatsapp.com/send?phone=$phone&text=" . urlencode($waMessage);
        header("Location: $waUrl");
        exit;
        if ($abc) {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Status berhasil diubah'
            ]);
            
        } else {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Gagal mengubah status'
            ]);
        }
    }
    

    public function index()
    {
        return view('status_view');
    }

}
