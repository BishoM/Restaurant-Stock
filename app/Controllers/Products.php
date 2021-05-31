<?php


namespace App\Controllers;


class Products extends BaseController
{
    public function StockIn2()
    {
        $products = new products();
        $data['products'] = $products->findAll();
        return view('KitchenView/Stock');
        //lets register user in db

        /*$data_login = array(
            'pro_name' => $this->input->Post('pro_name'),
            'pro_quantity' => $this->input->Post('pro_qua'),
            'pro_price' => $this->input->Post('pro_price'),
            'req_quantity' =>0,
            're_price' =>0,
            're_status' =>1
            );
        $this->load->database();
        $this->load->Model('main_model');
        $response = $this->main_model->do_registration($data_login);
        $this->log();

        $pro_name =$this->request->getPost('pro_name');
        $pro_qua =$this->request->getPost('pro_qua');
        $pro_price=$this->request->getPost('pro_price');

        $values= [
            'pro_name'=>$pro_name,
            'pro_quantity'=>$pro_qua,
            'pro_price'=>$pro_price,
            'req_status'=>1,
        ];
        $main_model = new \App\Models\UserModel();
        $query =$main_model->INSERT($values);
        if(!$query)
        {
            return redirect()->back()->with('fail','Operation failed!');
        }
        else
        {
            return redirect()->to('StockIn')->with('success', 'Product are registered successfully!');
        }*/

    }
}