<?php


namespace App\Controllers;


class Users extends \CodeIgniter\Controller
{
public function index()
{
    $db = \Config\Database::connect();
    $query = $db->query('SELECT full_name,address,contact from admin');
    $result = $query->getResult();
    echo '<pre>';
    print_r($result);
}
}