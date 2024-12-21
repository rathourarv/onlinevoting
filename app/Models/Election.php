<?php

namespace App\Models;

use CodeIgniter\Model;

class Election extends Model
{
    protected $table = 'election';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'electionName',
        'electionType',
        'startDate',
        'endDate'
    ];
}