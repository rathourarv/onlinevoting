<?php

namespace App\Models;

use CodeIgniter\Model;

class Vote extends Model
{
    protected $table = 'vote';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'electionID',
        'voterID',
        'candidateID',
        'voteTime'
    ];
}
