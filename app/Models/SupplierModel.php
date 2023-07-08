<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'sup_id';
    protected $DBGroup = 'default';
    protected $allowedFields = ['sup_id', 'sname', 'email', 'phone', 'rupee', 'gst', 'address', 'city', 'pincode', 'branch', 'account', 'ifsc', 'supplier_status'];
}
