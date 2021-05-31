<?php
namespace App\Models;

use CodeIgniter\Model;

class main_model extends Model
{
        protected $table = 'products';
        protected $primaryKey = 'pro_id';
        protected $allowedFields = ['pro_name', 'pro_quantity', 'pro_price','pro_used','pro_remain', 'req_quantity', 'req_price', 'req_status'];

}
?>