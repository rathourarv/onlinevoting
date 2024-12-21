<?php

namespace App\Models;

use CodeIgniter\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'email',
        'fback',
        'textbox'
    ];
}
