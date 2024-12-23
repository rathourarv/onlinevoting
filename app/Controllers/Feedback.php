<?php
namespace App\Controllers;
use App\Models\Feedback as FeedbackModel;
use CodeIgniter\Controller;

class Feedback extends Controller
{
    public function index()
    {
        $session = session();
        $data = [
            "username" => $session->get("first_name"),
            "email" => $session->get("email"),
            "name" => $session->get("first_name") . " " . $session->get("last_name"),
            "is_logged_in" => $session->get("isLoggedIn"),
            "message" => $session->getFlashdata('message'),
            "validation" => $session->getFlashdata('validation')
        ];
        return view("pages/feedback", $data);
    }
    public function store()
    {
        helper(['form']);
        $rules = [
            'name' => 'required|min_length[2]|max_length[50]',
            'textbox' => 'required|min_length[20]|max_length[200]',
            'fback' => 'required|min_length[2]|max_length[20]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email',
        ];

        $session = session();
        $data = [
            "email" => $session->get("email"),
            "name" => $session->get("first_name") . " " . $session->get("last_name"),
            "username" => $session->get("first_name"),
            "is_logged_in" => $session->get("isLoggedIn"),
        ];

        if ($this->validate($rules)) {
            $feedbackModel = new FeedbackModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'textbox' => $this->request->getVar('textbox'),
                'fback' => $this->request->getVar('fback'),
                'email' => $this->request->getVar('email'),
            ];
            $feedbackModel->save($data);
            $session->setFlashdata('message', 'Feedback submitted successfully');
            return redirect()->to('/feedback');

        } else {
            $data['validation'] = $this->validator;
            return view('/pages/feedback', $data);
        }
    }
}