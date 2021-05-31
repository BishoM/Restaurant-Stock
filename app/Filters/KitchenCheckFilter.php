<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class KitchenCheckFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('loggedUser')) {
            return redirect()->to('/Kitchen')->with('fail', 'You must logg in first!');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}
?>