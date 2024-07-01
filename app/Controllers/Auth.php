<?php

namespace App\Controllers;

use App\Models\AkunModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function proses_login()
    {
        $akunModel = new AkunModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $akun = $akunModel->where('username', $username)->where('password', $password)->first();
        
        if($akun){
            session()->set([
                'id_akun' => $akun['id_akun'],
                'username' => $akun['username'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/dashboard');
        }else{
            return redirect()->to('/login')->with('errors', collect(['password' => 'Username or password is incorrect.'])->all());
        }
    }

    public function proses_logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('message', 'You have been logged out successfully.');
    }
}