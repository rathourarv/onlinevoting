<?php
namespace App\Controllers;
use App\Models\Voter;
use CodeIgniter\Controller;

class Eligibility extends Controller
{
    public function index()
    {
        $session = session();
        $voterModel = new Voter();
        $voter = $voterModel
            ->where('userID', $session->get("id"))
            ->find();

        $data = [
            "username" => $session->get("first_name"),
            "is_logged_in" => $session->get("isLoggedIn"),
            "message" => $session->getFlashdata('message'),
            "validation" => $session->getFlashdata('validation')
        ];

        if ($voter) {
            $data["profile"] = $voter[0];
        }
        return view("pages/eligibility", $data);
    }
    public function update()
    {
        $session = session();
        $rules = [
            'firstName' => 'required|min_length[2]|max_length[50]',
            'lastName' => 'required|min_length[2]|max_length[50]',
            'address1' => 'required|min_length[2]|max_length[50]',
            'address2' => 'required|min_length[2]|max_length[50]',
            'city' => 'required|min_length[3]|max_length[20]',
            'state' => 'required|min_length[3]|max_length[20]',
            'zip' => 'required|min_length[6]|max_length[6]',
            'voterIDCard' => 'required|min_length[10]|max_length[10]',
            'aadharNumber' => 'required|min_length[12]|max_length[12]',
            'dob' => 'required|valid_date',
            'constituencyID' => 'required|min_length[1]|max_length[50]',
        ];
        if ($this->validate($rules)) {
            $voterModel = new Voter();
            $input = [
                'firstName' => $this->request->getVar('firstName'),
                'lastName' => $this->request->getVar('lastName'),
                'address1' => $this->request->getVar('address1'),
                'address2' => $this->request->getVar('address2'),
                'city' => $this->request->getVar('city'),
                'state' => $this->request->getVar('state'),
                'zip' => $this->request->getVar('zip'),
                'dob' => $this->request->getVar('dob'),
                'constituencyID' => $this->request->getVar('constituencyID'),
                'voterIDCard' => $this->request->getVar('voterIDCard'),
                'aadharNumber' => $this->request->getVar('aadharNumber')
            ];
            $voter = $voterModel
                ->where('userID', $session->get("id"))
                ->find();

            if ($voter) {
                $voterModel->update($voter[0]['id'], $input);
            } else {
                $input['userID'] = $session->get('id');
                $voterModel->save($input);
            }
            $session->setFlashdata('message', "Profile updated successfully");
            return redirect()->to('/eligibility');
        } else {
            $session->setFlashdata('validation', $this->validator);
            return redirect()->to('/eligibility');
        }
    }
}