<?php
namespace App\Models;

use CodeIgniter\Model;

class StockOut extends Model
{
    protected $table = 'stockout';
    protected $primaryKey = 'sto_id';
    protected $allowedFields = ['used_product', 'remain_product','pro_date', 'pro_id'];

}
?>