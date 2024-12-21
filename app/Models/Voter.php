<?php

namespace App\Models;

use CodeIgniter\Model;

class Voter extends Model
{
    protected $table = 'voter';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'userID',
        'firstName',
        'lastName',
        'gender',
        'dob',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'constituencyID',
        'aadharNumber',
        'voterIDCard',
        'isApproved'
    ];
}
