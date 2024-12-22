<?php
namespace App\Controllers\Admin;
use App\Models\User;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
    {
        $userModel = new User();
        $session = session();
        $users = $userModel->findAll();
        $data = [
            "users" => $users,
            "validation" => $session->getFlashdata('validation'),
            "message" => $session->getFlashdata('message'),
        ];
        return view("pages/admin/user", $data);
    }
    public function add()
    {
        $session = session();
        helper(['form']);
        $rules = [
            'firstName' => 'required|min_length[2]|max_length[50]',
            'lastName' => 'required|min_length[2]|max_length[50]',
            'username' => 'required|min_length[2]|max_length[50]',
            'mobile' => 'required|min_length[10]|max_length[10]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[user.email]',
        ];

        if ($this->validate($rules)) {
            $userModel = new User();
            $password = $this->random_password();
            log_message('info', 'Password: ' . $password);
            $data = [
                'firstName' => $this->request->getVar('firstName'),
                'lastName' => $this->request->getVar('lastName'),
                'username' => $this->request->getVar('username'),
                'mobile' => $this->request->getVar('mobile'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            $session->setFlashdata('message', 'User added succcessfully.');
            return redirect()->to('/admin/user');
        } else {
            $session = session();
            $session->setFlashdata('validation', $this->validator);
            return redirect()->to('/admin/user');
        }
    }
    private function random_password($length = 8)
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@%*%';
        $password = str_shuffle($alphabet);
        return substr($password, 0, $length);
    }
    public function remove($userID)
    {
        $userModel = new User();
        $userModel->where('id', $userID)->delete();
        $session = session();
        $session->setFlashdata('message', 'User deleted succcessfully.');
        return redirect()->to('/admin/user');
    }
}