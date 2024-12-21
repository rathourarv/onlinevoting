<?php
namespace App\Controllers\Admin;
use App\Models\Election;
use CodeIgniter\Controller;

class ElectionController extends Controller
{
    public function index()
    {
        $electionModel = new Election();
        $elections = $electionModel->findAll();
        $data = [
            "elections" => $elections
        ];
        return view("pages/admin/election", $data);
    }
    public function add()
    {
        helper(['form']);
        $rules = [
            'electionName' => 'required|min_length[2]|max_length[50]',
            'electionType' => 'required|min_length[2]|max_length[50]',
            'startDate' => 'required|valid_date',
            'endDate' => 'required|valid_date',
        ];

        if ($this->validate($rules)) {
            $electionModel = new Election();
            $data = [
                'electionName' => $this->request->getVar('electionName'),
                'electionType' => $this->request->getVar('electionType'),
                'startDate' => $this->request->getVar('startDate'),
                'endDate' => $this->request->getVar('endDate'),
            ];
            $electionModel->save($data);
            return redirect()->to('/admin/election');
        } else {
            $data['validation'] = $this->validator;
            return redirect()->to('/admin/election');
        }
    }
    public function remove($electionID)
    {
        $electionModel = new Election();
        $electionModel->where('id', $electionID)->delete();
        $session = session();
        $session->setFlashdata('message', 'Election deleted succcessfully.');
        return redirect()->to('/admin/election');
    }
}