<?php

namespace App\Models;

use CodeIgniter\Model;

class BuyFormModel extends Model
{
    
    protected $table = 'buy_form';
    protected $timestamp = true;
    protected $primarykey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'email', 'invoice', 'time', 'status', 'token'
    ];
}
