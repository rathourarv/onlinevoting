<?php

namespace App\Models;

use CodeIgniter\Model;

class Constituency extends Model
{
    protected $table = 'constituency';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'constituencyName',
        'state',
        'type'
    ];
}