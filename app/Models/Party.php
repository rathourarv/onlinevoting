<?php

namespace App\Models;

use CodeIgniter\Model;

class Party extends Model
{
    protected $table = 'party';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'partyName',
        'partySymbol',
        'leaderName',
        'foundedYear'
    ];
}