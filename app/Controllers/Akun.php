<?php

namespace App\Controllers;
use App\Models\AkunModel;

class Akun extends BaseController
{
    
    public function index()
    {
        $akunModel = new AkunModel();
        $akun['akun'] = $akunModel->findAll();

        echo view('layout/header');
        echo view('layout/sidebar');
        return view('owner/akun', $akun);
        echo view('layout/footer');
    }

    public function login()
    {
        return view('login');
    }

    public function tambah()
    {
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('owner/tambah_akun');
        echo view('layout/footer');
    }

    public function simpan()
    {
        $akunModel = new AkunModel();
        
        // Check if the form is submitted
        // if ($this->request->getMethod() === 'post') {
            // Validate the form input
            
            // if ($validation->withRequest($this->request)->run()) {
                // Get the form data
                $data = [
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level')
                ];
                // var_dump($data);exit;

                // Save the data to the database
                $akunModel->save($data);

                // Redirect to the akun index page
                return redirect()->to('/akun');
            // }
        // }

    }

}
