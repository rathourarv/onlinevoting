<?php
namespace App\Controllers;
use App\Models\Election;
use CodeIgniter\Controller;

class Results extends Controller
{
  public function index()
  {
    $session = session();
    $election = new Election();
    $completed_elections = $election->where('endDate < current_date()')->findAll();
    $data = [
      "username" => $session->get("first_name"),
      "is_logged_in" => $session->get("isLoggedIn"),
      "completed_elections" => $completed_elections,
    ];
    return view("pages/results", $data);
  }
  public function view($election_id)
  {
    $sql = "SELECT
        c.constituencyID,
        cons.constituencyName,
        c.id,
        p.partyName,
        CONCAT(c.firstName, ' ', c.lastName) AS candidateName,
        MAX(votes.totalVotes) AS votes
      FROM
        (
          SELECT
            candidateID,
            COUNT(id) AS totalVotes
          FROM
            vote
          WHERE
            electionID = $election_id
          GROUP BY
            candidateID
        ) votes
        JOIN candidate c ON votes.candidateID = c.id
        JOIN constituency cons ON c.constituencyID = cons.id
        JOIN party p on p.id = c.partyID
      GROUP BY c.constituencyID, c.id;";

    $db = db_connect();
    $builder = $db->query($sql);
    $results = $builder->getResultArray();

    $session = session();
    $election = new Election();
    $current_election = $election->find($election_id);

    $data = [
      "username" => $session->get("first_name"),
      "is_logged_in" => $session->get("isLoggedIn"),
      "results" => $results,
      "election" => $current_election,
    ];
    return view("pages/resultView", $data);
  }
}