<?php

namespace App\Controllers;
use App\Models\PesananModel;

class Pesanan extends BaseController
{

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
