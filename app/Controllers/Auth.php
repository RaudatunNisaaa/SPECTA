<?php

namespace App\Controllers;

use App\Models\AkunModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('admin/login');
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
                'level' => $akun['level'],
                'isLoggedIn' => true
            ]);
            if($akun['level'] == 'admin') {
                return redirect()->to('/dashboard');
            } elseif($akun['level'] == 'owner') {
                return redirect()->to('/dasboard');
            } else {
                return redirect()->to('/login')->with('errors', collect(['password' => 'Level not recognized.'])->all());
            }
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