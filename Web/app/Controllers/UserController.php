<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('pages/login');
    }

    public function register()
    {
        // $data = [
        //     'validation' => \Config\Services::validation()
        // ];

        return view('pages/register'); //, $data
    }

    public function create()
    {
        if (!$this->validate([
            'username' => 'required|is_unique[users.username]',
            'password2' => 'matches[password]'
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to(base_url('register')); //->with('validation', $validation);
        }

        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);

        echo "<script> alert('User succesfully registered!'); </script>";

        return view('pages/login');
    }

    public function login()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->userModel->where('username', $username)->first();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                if (isset($_SESSION['loginErr'])) {
                    unset($_SESSION['loginErr']);
                }

                return redirect()->to(base_url('home'));
            }
        }
        $_SESSION['loginErr'] = 'User not found!';
        $session->markAsFlashData('loginErr');

        return redirect()->to(base_url('login'));
    }
}
