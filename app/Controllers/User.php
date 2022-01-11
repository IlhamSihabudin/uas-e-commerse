<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $session = session();

        $userModel = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            if($pass == base64_encode($password)){
                $ses_data = [
                    'id' => $data['id'],
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);
                return $this->response->redirect(base_url('/user/dashboard'));
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return $this->response->redirect(base_url('/'));
            }

        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return $this->response->redirect(base_url('/'));
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function store()
    {
        $model = new UserModel();
        if ($this->request->getVar('password') == $this->request->getVar('repeat_password')) {
            $model->insert([
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'password' => base64_encode($this->request->getVar('password')),
            ]);

            session()->setFlashdata('success', "Add User Successfully");
            return $this->response->redirect(base_url('/'));
        }else {
            return $this->response->redirect(base_url('/register'));
        }
    }
}
