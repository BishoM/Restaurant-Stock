<?php
namespace App\Models;

use CodeIgniter\Model;

class StockIn extends Model
{
    protected $table = 'stockin';
    protected $primaryKey = 'sto_id';
    protected $allowedFields = ['sto_quantity', 'sto_price','sto_date', 'pro_id'];

}
?>