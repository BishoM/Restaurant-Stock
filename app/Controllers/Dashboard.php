<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Libraries\Hash;
use App\Models\main_model;

class Dashboard extends BaseController
{
    public function StockIn()
    {
        //echo "Product inserted successfully!";
        return View('Kitchen/Stock');
    }
    public function Stock()
    {
        $main_model = new \App\Models\main_model();
        $mainModelInfo = $main_model->findAll();
        $data = [
            'mainModelInfo' =>  $mainModelInfo
        ];
        return view('/KitchenView/Stock',$data);
    }
}
?>
