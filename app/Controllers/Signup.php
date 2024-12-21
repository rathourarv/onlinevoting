<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\User;

class Signup extends Controller
{
    public function index()
    {
        helper(['form']);
        $session = session();
        $data = [
            "username" => $session->get("first_name"),
            "is_logged_in" => $session->get("isLoggedIn")
        ];
        echo view('pages/signup', $data);
    }
    public function store()
    {
        helper(['form']);
        $rules = [
            'first_name' => 'required|min_length[2]|max_length[50]',
            'last_name' => 'required|min_length[2]|max_length[50]',
            'username' => 'required|min_length[2]|max_length[50]',
            'mobile' => 'required|min_length[10]|max_length[10]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $userModel = new User();
            $data = [
                'firstName' => $this->request->getVar('first_name'),
                'lastName' => $this->request->getVar('last_name'),
                'username' => $this->request->getVar('username'),
                'mobile' => $this->request->getVar('mobile'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to('/signin');
        } else {
            $data['validation'] = $this->validator;
            $data['is_logged_in'] = FALSE;
            echo view('pages/signup', $data);
        }
    }
}