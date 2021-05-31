<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Kitchen extends BaseController
{
    public function index()
    {
        return view('KitchenView/login');
    }
    public function register()
    {

        return view("KitchenViews/register");
    }
    public function save(){
        //form validation
        //$validation = $this->validate([
        //    'username' =>'required',
        //      'email' =>'required|valid_email|is_unique[users.email]',
        //    'phone' =>'required|min_lenght[10]|max_lenght[13]|is_unique[users.phone]',
        //   'password' =>'required',
        //   'cpassword' =>'required|matches[password]'

        //]);
        $validation = $this->validate([
            'username' => ['required',
                'errors' =>[
                    'required' => "your username is required"
                ]
            ],
            'email' =>[
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'You must enter a valid email',
                    'is_unique' => 'Email already taken'
                ]
            ],
            'phone'=>[
                'rules'=>'required|min_length[10]|max_length[10]|is_unique[users.phone]',
                'errors'=>[
                    'required'=> 'phone is required',
                    'is_unique'=> 'phone number already taken',
                    'min_length' => 'phone must have atleast 10 numbers in length',
                    'max_length' => 'phone must not exceed more than 10 numbers in length'
                ]
            ],
            'password' =>[
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' =>[
                    'required' => 'Password is required',
                    'min_length' => 'Password must have atleast 5 characters in length',
                    'max_length' => 'Password must not have characters more than 12 in length'
                ]
            ],
            'cpassword'=>[
                'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
                'errors'=>[
                    'required' => 'Confirm Password is required',
                    'min_length' => 'Confirm Password must have atleast 5 characters in length',
                    'max_length' => 'Confirm Password must not have characters more than 12 in length',
                    'matches'=> 'Confirm password not matches with password'
                ]
            ],
        ]);
        if(!$validation){
            return view('KitchenViews/register',['validation'=>$this->validator]);
        }
        else{
            //lets register user in db
            $username =$this->request->getPost('username');
            $email=$this->request->getPost('email');
            $phone=$this->request->getPost('phone');
            $password=$this->request->getPost('password');

            $values= [
                'username'=>$username,
                'email'=>$email,
                'phone'=>$phone,
                'password'=>Hash::make($password),
            ];
            $userModel = new \App\Models\userModel();
            $query =$userModel->insert($values);
            if(!$query){
                return redirect()->back()->with('fail','Operation failed!');                        }
            else{
                //return redirect()->to('register')->with('succsess', 'you are registered succcessfuly!');
                //return view("KitchenViews/login");
                $last_id = $userModel->insertId();//this is last inserted id
                session()->set('loggedUser', $last_id);
                return redirect()->to('/dashboard');
            }
        }
    }
    function check(){
        //let's start validation
        $validation = $this->validate([
            'email'=>[
                'rules'=> 'required|valid_email|is_not_unique[users.email]',
                'errors'=> [
                    'required'=>'email is required',
                    'valid_email'=> 'Enter a valid email address',
                    'is_not_unique'=>'This email is not registered on our server'
                ]
            ],
            'password'=>[
                'rules'=>'required|min_length[5]|max_length[12]',
                'errors'=>[
                    'required'=>'password is required',
                    'min_length'=>'password must be atleast 5 characters in length',
                    'max_lentgth'=>'password must not excceed 12 characters in length'
                ]
            ],
        ]);
        if(!$validation){
            return view('KitchenViews/login',['validation'=>$this->validator]);
        }
        else{
            //let's check user
            $email = $this->request->getPost('email');
            $password =$this->request->getPost('password');
            $userModel = new \App\Models\userModel();
            $user_info = $userModel->where('email',$email)->first();
            $check_password =Hash::check($password,$user_info['password']);

            if(!$check_password){
                session()->setFlashdata('fail','incorrect password');
                return redirect()->to('/Kitchen')->withInput();
            }else{
                $user_id = $user_info['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('/Dashboard');
            }
        }
    }

    function logout(){
        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
            return redirect()->to('/Kitchen?access=out')->with('fail', 'you are logged out!');
        }
    }
}
