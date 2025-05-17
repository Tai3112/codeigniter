<?php

namespace App\Services;
use App\Models\AdminModel;//Gọi đến file AdminModel
use Exception;
class AdminService extends BaseService
{
    private $admins; //Biến cục bộ
    function __construct(){
        parent::__construct();
        $this -> admins = new AdminModel();//Khởi tạo đối tượng và gán vào admins
        $this -> admins -> protect(false); //Bảo vệ bảng
        ///admins => CONNECT tới bảng admin
    }
    //Hàm lấy tất cả dữ liệu trong bảng Admin
    public function layTatCaDataAdmin(){
        return $this->admins->findAll();
    }
    public function layDataAdminTheoUsername($username){
        return $this->admins->where('username', $username) ->first();
    }

    public function themAdmin($requestData){
        $validate = $this->validationThemAdmin($requestData);
        if($validate->getErrors()){
            
            return [
                'status'=> 'ERROR',
                'messageCode'=>'MESSAGE_ERROR',
                'messages'=> $validate->getErrors()
            ];
        }else{
            try {
                $dataSave = $requestData->getPost();
                unset($dataSave['repassword']);
                $dataSave['password'] = password_hash($dataSave['password'], PASSWORD_BCRYPT);
                $this->admins->save($dataSave);
                return [
                    'status'=> 'SUCCESS',
                    'messageCode'=>'MESSAGE_SUCCESS',
                    'messages'=> ['MESSAGE_SUCCESS'=>'Đăng ký thành công']
                ];
            } catch (Exception $e) {
                return [
                    'status'=> 'ERROR',
                    'messageCode'=>'MESSAGE_ERROR',
                    'messages'=> ['MESSAGE_SUCCESS'=>$e->getMessage()]
                ];
            }            
        }
    }
    
    private function validationThemAdmin($requestData){
        //1 mảng trong php
        //$rule = []
        $rule = [
            'email'=>'required|valid_email',
            'username'=>'required|max_length[30]|min_length[3]',
            'password'=>'required|max_length[255]|min_length[3]',
            'repassword'=>'required|matches[password]',
        ];
        $message = [
            'email'=>[
                'required'=>'Địa chỉ email không được để trống',
                'valid_email'=>'Email nhập sai định dạng'
            ],
            'username'=>[
                'required'=>'Tên tài khoản không được để trống',
                'max_length'=>'Tên tài khoản tối đa {param} ký tự',
                'min_length'=>'Tên tài khoản ít nhất {param} ký tự'
            ],
            'password'=>[
                'required'=>'Mật khẩu không được để trống',
                'max_length'=>'Mật khẩu tối đa {param} ký tự',
                'min_length'=>'Mật khẩu ít nhất {param} ký tự'
            ],
            'repassword'=>[
                'required'=>'Nhập lại mật khẩu không được để trống',
                'matches'=>'Mật khẩu nhập lại không khớp',
            ]
        ];
        $this->validation->setRules($rule,$message);
        //validation = [[rule],[message]]
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }

    public function kiemtraLogin($requestData){
        $validate = $this->validationLogin($requestData);
        if($validate->getErrors()){
            
            return [
                'status'=> 'LOI',
                'messageCode'=>'LOI',
                'messages'=> $validate->getErrors()
            ];
        }else{
            try {
                $data = $requestData->getPost();
                //$data = ['username'=>'abc','password'=>'1234']
                $user = $this->admins->where('username',$data['username'])->first();
                //SELECT top 1 FROM admin WHERE username = 
                //tìm kiếm trong bảng admin theo username, lấy 1 giá trị
                if(!$user){
                    return [
                        'status'=> 'LOI',
                        'messageCode'=>'LOI',
                        'messages'=> ['khongtontai'=>'Tài khoản không tồn tại']
                    ];
                }
                if(!password_verify($data['password'], $user['password'])){
                    return [
                        'status'=> 'LOI',
                        'messageCode'=>'LOI',
                        'messages'=> ['matkhauloi'=>'Mật khẩu không khớp']
                    ];       
                }
                $session = session();
                unset($user['password']);//loại bỏ giá trị password
                $session->set('user_login', $user);//gán giá trị user vào biến user_login
                //gán biến 'user_login' = biến $user = ['username','email','date']
                return [
                    'status'=> 'OK',
                    'messageCode'=>'OK',
                    'messages'=> null
                ];
            } catch (Exception $e) {
                return [
                    'status'=> 'ERROR',
                    'messageCode'=>'MESSAGE_ERROR',
                    'messages'=> ['MESSAGE_SUCCESS'=>$e->getMessage()]
                ];
            }            
        }
    }
    
    private function validationLogin($requestData){
        //1 mảng trong php
        //$rule = []
        $rule = [
            'username'=>'required|max_length[30]|min_length[3]',
            'password'=>'required|max_length[255]|min_length[3]',
        ];
        $message = [
            'username'=>[
                'required'=>'Tên tài khoản không được để trống',
                'max_length'=>'Tên tài khoản tối đa {param} ký tự',
                'min_length'=>'Tên tài khoản ít nhất {param} ký tự'
            ],
            'password'=>[
                'required'=>'Mật khẩu không được để trống',
                'max_length'=>'Mật khẩu tối đa {param} ký tự',
                'min_length'=>'Mật khẩu ít nhất {param} ký tự'
            ]
        ];
        $this->validation->setRules($rule,$message);
        //validation = [[rule],[message]]
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }
}
