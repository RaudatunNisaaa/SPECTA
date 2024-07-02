<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Menu extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        $this->menuModel = new MenuModel();
    }
    
    public function index()
    {
        // Panggil data menu dari model
        $data['menu'] = $this->menuModel->join('jenismakanan', 'jenismakanan.id_jenis=makanan.id_jenis')->findAll();
        // var_dump($data);
        // exit;

        // Panggil view menu dengan data
        return view('menu', $data);
    }

    public function tambahKeKeranjang()
    {
        // Ambil data nama dan harga dari request POST
        $namaItem = $this->request->getPost('nama');
        $hargaItem = $this->request->getPost('harga');

        // Simpan data ke dalam session atau database sesuai kebutuhan
        // Contoh disini menggunakan session
        $cart = session()->get('cart');
        $cart[] = [
            'nama' => $namaItem,
            'harga' => $hargaItem,
            'jumlah' => 1 // Anda bisa menambahkan jumlah item juga jika diperlukan
        ];
        session()->set('cart', $cart);

        // Redirect kembali ke halaman menu atau halaman chart
        return redirect()->to('/menu'); // Ganti "/menu" dengan route yang sesuai
    }

    public function pesan($id)
    {
        // Ambil data item menu berdasarkan ID
        $data['pesan'] = $this->menuModel->find($id);
        // var_dump($itemMenu);
        // exit;
        return view('checkout', $data);

        // if (!$itemMenu) {
        //     // Jika item tidak ditemukan, redirect ke halaman menu
        //     return redirect()->to('/menu');
        // }

        // // Tambahkan item menu ke dalam session cart
        // $cart = session()->get('cart') ?? [];
        // $cart[] = [
        //     'id' => $itemMenu['id'],
        //     'nama' => $itemMenu['nama'],
        //     'harga' => $itemMenu['harga'],
        //     'jumlah' => 1 // Default jumlah adalah 1, bisa diubah sesuai dengan input user nantinya
        // ];
        // session()->set('cart', $cart);

        // // Redirect ke halaman cart untuk melihat item
        // return redirect()->to('/cart'); // Pastikan route '/cart' sudah ada dan sesuai
    }
}