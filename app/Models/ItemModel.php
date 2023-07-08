<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'item_id';
    protected $DBGroup = 'default';
    protected $allowedFields = ['item_id', 'item_name', 'item_code', 'item_status'];
}
