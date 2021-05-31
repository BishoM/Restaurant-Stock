<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Libraries\Hash;
use App\Models\mainmodel;

class Kitchen extends Controller
{
    public function __construct()
    {
        helper(['url','form']);

    }
    public function index()
    {
        return view('KitchenView/login');
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
    public function StockIn()
    {
        return View('KitchenView/StockIn');
    }
    public function StockReq()
    {
        $main_model = new \App\Models\main_model();
        $mainModelInfo = $main_model->findAll();
        $data = [
            'mainModelInfo' =>  $mainModelInfo
        ];
        return View('KitchenView/StockReq',$data);
    }
    public function StockReq2()
    {
        $main_model = new \App\Models\main_model();
        $id = $this->request->getVar('pro_id');
        $a = $this ->request ->getVar('pro_qua');
        $data = ['req_quantity' => $a,
            'req_status' =>2,
        ];
        $main_model -> update($id,$data);

        $values= [
            'sto_quantity'=>$a,
            'pro_id'=>$id,
        ];
        $productModel = new \App\Models\StockIn();
        $query =$productModel->insert($values);

        return redirect()->to(base_url('/Dashboard/Stock'));
    }
    public function StockOutOp()
    {
        $main_model = new \App\Models\main_model();
        $id = $this->request->getVar('pro_id');
        $a = $this ->request ->getVar('pro_qua');
        $b = $this ->request ->getVar('pro_remain')-$a;
        $c = $this ->request ->getVar('pro_used')+$a;
        $data = ['pro_used' => $c,
            'pro_remain' => $b,
            ];
        $main_model -> update($id,$data);

        $values= [
            'used_product'=>$c,
            'remain_product'=>$b,
            'pro_id'=>$id,
           ];

        $productModel = new \App\Models\StockOut();
        $query =$productModel->insert($values);

        return redirect()->to(base_url('/Dashboard/Stock'));
    }
    public function StockOut()
    {
        $main_model = new \App\Models\main_model();
        $mainModelInfo = $main_model->findAll();
        $data = ['mainModelInfo' =>  $mainModelInfo];
        return view('/KitchenView/StockOut',$data);
    }
    public function StockOutt($id)
    {
        $main_model = new \App\Models\main_model();
        $data['row'] = $main_model->where('pro_id',$id)->first();
        return View('KitchenView/StockOutt',$data);
    }
    public function StockOut2()
    {

        $pro_id =$this->request->getPost('pro_id');
        $pro_qua =$this->request->getPost('pro_qua');

        $values= [
            'sto_quantity'=>$pro_qua,
            'pro_id'=>$pro_id,
            ];

        $stockoutmodel = new \App\Models\StockOut();
        $query =$stockoutmodel->INSERT($values);
        if(!$query){
            return redirect()->back()->with('fail','Operation failed!');
        }
        else{
            echo "Stockout successfully!";
            //return redirect()->to('/Dashboard/Stock');
            //return view('/dashboard/patientMed');
        }

    }
    public function StockIn2()
    {
        $pro_name =$this->request->getPost('pro_name');
        $pro_qua =$this->request->getPost('pro_qua');
        $pro_price =$this->request->getPost('pro_price');

        $values= [
            'pro_name'=>$pro_name,
            'pro_quantity'=>$pro_qua,
            'pro_price'=>$pro_price,
            'pro_remain'=>$pro_qua,
            'pro_used'=>0,
            'req_status'=>1,
        ];

        $productModel = new \App\Models\main_model();
        $query =$productModel->insert($values);
        if(!$query){
            return redirect()->back()->with('fail','Operation failed!');
        }
        else{
            //$patient_id = $patientModel->insertId();//this is last inserted id
            //session()->set('patientid', $patient_id);
            return redirect()->to('/Dashboard/Stock');
            //return view('/dashboard/patientMed');
        }

    }
    function CheckLogin()
    {
        //echo "Login successfully";
        $validation = $this->validate([
            'email'=>[
                'rules'=> 'required|valid_email|is_not_unique[admin.email]',
                'errors'=> [
                    'required'=>'email is required',
                    'valid_email'=> 'Enter a valid email address',
                    'is_not_unique'=>'This email is not registered on our server']],
            'password'=>[
                'rules'=>'required|min_length[4]|max_length[12]',
                'errors'=>[
                    'required'=>'password is required',
                    'min_length'=>'password must be atleast 4 characters in length',
                    'max_lentgth'=>'password must not excceed 12 characters in length'
                ]
            ],
        ]);
        if(!$validation){
            return view('kitchenView/login',['validation'=>$this->validator]);
        }
        else
        {
           //echo "Validation successfully";
            //let's check user
            $email = $this->request->getPost('email');
            $password =$this->request->getPost('password');
            $userModel = new \App\Models\UserModel();
            $user_info = $userModel->where('email',$email)->first();
            $check_password =Hash::check($password,$user_info['password']);

            if(!$check_password)
            {
                session()->setFlashdata('fail','incorrect password');
                return redirect()->to('/Kitchen')->withInput();
            }
            else
            {
                if(ad_status==1)
                {
                    //echo "Login Successfully";
                    $user_id = $user_info['id'];
                    session()->set('loggedUser', $user_id);
                    return redirect()->to('/Kitchen/Dashboard');
                }
                elseif(ad_status==2)
                {
                    //echo "Login Successfully";
                    $user_id = $user_info['id'];
                    session()->set('loggedUser', $user_id);
                    return redirect()->to('/Kitchen/Dashboard2');
                }
                else
                {
                    echo "Unknown privilege";
                }

            }

        }
    }

    public function Dashboard()
    {
        $userModel = new \App\Models\userModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $data = [
            'title'=> 'Dashboard',
            'userInfo'=>$userInfo
        ];
        return View('kitchenView/Dashboard',$data);
    }
    function Logout()
    {
        if (session()->has('loggedUser'))
        {
            session()->remove('loggedUser');
            return redirect()->to('/Kitchen?access=out')->with('fail', 'you are logged out!');
        }
    }

    public function Register()
    {
        return View("KitchenView/Register");
    }

    public function InsertUser()
    {
        /* $validation = $this->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min_length[4]|max_length[12]',
            'cpassword' => 'required|min_length[4]|max_length[12]|matches[password]',
            'email' => 'required|valid_email|is_unique[admin.email]']);

       */
        $validation = $this->validate([
            'name' => ['required', 'errors' => [
                'required' => "your name is required"]],
            'username' => ['required', 'errors' => [
                'required' => "your username is required"]],
            'password' => ['rules' => 'required|min_length[4]|max_length[12]',
                'errors' => ['required' => 'Password is required',
                    'min_length' => 'Password must have at least 4 characters in length',
                    'max_length' => 'Password must not have characters more than 12 in length']],
            'cpassword' => [
                'rules' => 'required|min_length[4]|max_length[12]|matches[password]',
                'errors' => [
                    'required' => 'Confirm Password is required',
                    'min_length' => 'Confirm Password must have at least 4 characters in length',
                    'max_length' => 'Confirm Password must not have characters more than 12 in length',
                    'matches' => 'Confirm password not matches with password']],
            'email' => [
                'rules' => 'required|valid_email|is_unique[admin.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'You must enter a valid email',
                    'is_unique' => 'Email already taken'
                ]
            ],
        ]);
        if (!$validation) {
            return view('kitchenView/Register', ['validation' => $this->validator]);
        }
        else
        {
           // echo "Form validate successfull!";

            //lets register user in db
            $name =$this->request->getPost('name');
            $username =$this->request->getPost('username');
            $password=$this->request->getPost('password');
            //$cpassword=$this->request->getPost('cpassword');
            $email=$this->request->getPost('email');

            $values= [
                'full_name'=>$name,
                'username'=>$username,
                'password'=>Hash::make($password),
                'email'=>$email,
            ];
            $userModel = new \App\Models\UserModel();
            $query =$userModel->insert($values);
            if(!$query)
            {
                return redirect()->back()->with('fail','Operation failed!');
            }
            else
            {
                return redirect()->to('Register')->with('success', 'you are registered successfully!');
               // $last_id = $userModel->insertId();//this is last inserted id
                //session()->set('loggedUser', $last_id);
                //return redirect()->to('/dashboard');
            }
        }
    }
}