<?php
namespace App\Controllers;
use App\Models\User;
use CodeIgniter\Controller;

class Profile extends Controller
{
    public function index()
    {
        $session = session();
        $userModel = new User();
        $user = $userModel
            ->where('id', $session->get("id"))
            ->find();

        $data = [
            "username" => $session->get("first_name"),
            "is_logged_in" => $session->get("isLoggedIn"),
            "message" => $session->getFlashdata('message'),
            "validation" => $session->getFlashdata('validation')
        ];

        if ($user) {
            $data["profile"] = $user[0];
        }
        return view("pages/profile", $data);
    }
    public function update()
    {
        $session = session();
        $rules = [
            'firstName' => 'required|min_length[2]|max_length[50]',
            'lastName' => 'required|min_length[2]|max_length[50]',
            'username' => 'required|min_length[2]|max_length[50]',
            'mobile' => 'required|min_length[10]|max_length[10]',
        ];
        if ($this->validate($rules)) {
            $userModel = new user();
            $input = [
                'firstName' => $this->request->getVar('firstName'),
                'lastName' => $this->request->getVar('lastName'),
                'username' => $this->request->getVar('username'),
                'mobile' => $this->request->getVar('mobile'),
            ];
            $user = $userModel
                ->where('id', $session->get("id"))
                ->find();

            $userModel->update($user[0]['id'], $input);
            // update session data
            $ses_data = [
                'id' => $user[0]['id'],
                'first_name' => $this->request->getVar('firstName'),
                'last_name' => $this->request->getVar('lastName'),
                'email' => $user[0]['email'],
                'is_admin' => $user[0]['isAdmin'],
                'isLoggedIn' => TRUE
            ];
            $session->set($ses_data);
            $session->setFlashdata('message', "Profile updated successfully");
            return redirect()->to('/profile');
        } else {
            $session->setFlashdata('validation', $this->validator);
            return redirect()->to('/profile');
        }
    }
}