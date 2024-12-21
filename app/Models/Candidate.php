<?php

namespace App\Models;

use CodeIgniter\Model;

class Candidate extends Model
{
    protected $table = 'candidate';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'firstName',
        'lastName',
        'partyID',
        'constituencyID',
        'electionID'
    ];
}