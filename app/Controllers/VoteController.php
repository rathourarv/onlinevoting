<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Voter;
use App\Models\Vote;
use App\Models\Candidate;

class VoteController extends BaseController
{
    public function index()
    {
        $electionID = $this->request->getGet('election_id');
        $session = session();
        $voterModel = new Voter();
        $candidateModel = new Candidate();

        $voter = $voterModel
            ->where('userID', $session->get("id"))
            ->find();

        if (!$voter) {
            $session->setFlashdata("warning", "Please update your voter eligibility details to start voting...");
            return redirect()->to(previous_url());
        }
        $constituencyID = $voter[0]["constituencyID"];
        $candidates = $candidateModel
            ->where("constituencyID", $constituencyID)
            ->where("electionID", $electionID)
            ->join('party', 'party.id = candidate.partyID')
            ->join('constituency', 'constituency.id = candidate.constituencyID')
            ->find();

        $data = [
            "username" => $session->get("first_name"),
            "is_logged_in" => $session->get("isLoggedIn"),
            "candidates" => $candidates,
            "message" => $session->getFlashdata('message')
        ];

        return view("pages/vote", $data);
    }
    function submit()
    {
        $electionID = $this->request->getGet('election_id');
        $candidateID = $this->request->getGet('candidate_id');
        $voterModel = new Voter();
        $session = session();

        $voter = $voterModel
            ->where('userID', $session->get("id"))
            ->find();

        if (!$voter || $voter[0]["isApproved"] == 0) {
            $session->setFlashdata("message", "You are not allowed to vote at this moment, Please wait for someone to review your details.");
            return redirect()->to(sprintf('/vote?election_id=%s', $electionID));
        }

        $voteModel = new Vote();
        $data = [
            'electionID' => $electionID,
            'candidateID' => $candidateID,
            'voterID' => $voter[0]["id"]
        ];
        $voteModel->save($data);
        $session->setFlashdata("message", "Vote submitted Successfully");
        return redirect()->to(sprintf('/vote?election_id=%s', $electionID));
    }
}
