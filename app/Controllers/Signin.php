<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\User;

class Signin extends Controller
{
    public function index()
    {
        $session = session();
        $data = [
            "username" => $session->get("first_name"),
            "is_logged_in" => $session->get("isLoggedIn")
        ];
        helper(filenames: ['form']);
        return view('pages/signin', $data);
    }
    public function loginAuth()
    {
        $session = session();
        $userModel = new User();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'first_name' => $data['firstName'],
                    'last_name' => $data['lastName'],
                    'email' => $data['email'],
                    'is_admin' => $data['isAdmin'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                $session->setFlashdata('message', 'Welcome back, ' . $data['firstName']);
                if ($data['isAdmin']) {
                    return redirect()->to('/admin/dashboard');
                }
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/signin');
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/signin');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/dashboard');
    }
}