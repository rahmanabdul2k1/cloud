<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table = 'unit';
    protected $primaryKey = 'unit_id';
    protected $DBGroup = 'default';
    protected $allowedFields = ['unit_id', 'unit_name', 'unit_status'];
}
