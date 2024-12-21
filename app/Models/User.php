<?php
namespace App\Models;
use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'user';

    protected $allowedFields = [
        'firstName',
        'lastName',
        'username',
        'email',
        'password',
        'mobile',
        'isAdmin'
    ];
}