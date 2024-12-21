<?php
namespace App\Controllers\Admin;
use App\Models\Candidate;
use App\Models\Constituency;
use App\Models\Election;
use App\Models\Party;
use CodeIgniter\Controller;

class CandidateController extends Controller
{
    public function index()
    {
        $session = session();
        $candidateModel = new Candidate();
        $partyModel = new Party();
        $electionModel = new Election();
        $constituencyModel = new Constituency();


        $data = [
            "candidates" => $candidateModel
                ->join('party', 'party.id = candidate.partyID')
                ->join('election', 'election.id = candidate.electionID')
                ->join('constituency', 'constituency.id = candidate.constituencyID')
                ->select('candidate.id, candidate.firstName, candidate.lastName, party.partyName, election.electionName, constituency.constituencyName')
                ->findAll(),
            "parties" => $partyModel->findAll(),
            "elections" => $electionModel->findAll(),
            "constituencies" => $constituencyModel->findAll(),
            "validation" => $session->getFlashdata('validation'),
            "message" => $session->getFlashdata('message'),
        ];
        return view("pages/admin/candidate", $data);
    }
    public function add()
    {
        $session = session();
        helper(['form']);
        $rules = [
            'firstName' => 'required|min_length[2]|max_length[50]',
            'lastName' => 'required|min_length[2]|max_length[50]',
            'partyID' => 'required',
            'electionID' => 'required',
            'constituencyID' => 'required',
        ];

        if ($this->validate($rules)) {
            $candidateModel = new candidate();
            $data = [
                'firstName' => $this->request->getVar('firstName'),
                'lastName' => $this->request->getVar('lastName'),
                'partyID' => $this->request->getVar('partyID'),
                'electionID' => $this->request->getVar('electionID'),
                'constituencyID' => $this->request->getVar('constituencyID'),
            ];
            $candidateModel->save($data);
            $session->setFlashdata('message', 'Candidate added succcessfully.');
            return redirect()->to('/admin/candidate');
        } else {
            $session = session();
            $session->setFlashdata('validation', $this->validator);
            return redirect()->to('/admin/candidate');
        }
    }
    public function remove($candidateID)
    {
        $candidateModel = new Candidate();
        $candidateModel->where('id', $candidateID)->delete();
        $session = session();
        $session->setFlashdata('message', 'Candidate deleted succcessfully.');
        return redirect()->to('/admin/candidate');
    }
}