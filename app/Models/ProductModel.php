<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'pro_id';
    protected $DBGroup = 'default';
    protected $allowedFields = ['pro_id', 'pro_item', 'pro_name', 'pro_unit', 'min_qty', 'max_qty', 'pro_consumable', 'pro_img', 'pro_status', 'pro_specify', 'pro_remarks'];

    public function product()
    {
        $db = db_connect();
        $sql = "SELECT *, IF(pro_status = 1, 'Active', 'Deactive') AS status FROM product";
        $result = $db->query($sql);
        return $result->getResultArray();
    }
}
