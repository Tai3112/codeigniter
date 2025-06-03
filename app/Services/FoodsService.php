<?php

namespace App\Services;
use App\Models\DishesModel;//Gọi đến file AdminModel
use Exception;
class FoodsService extends BaseService
{
    private $dishes; //Biến cục bộ
    function __construct(){
        parent::__construct();
        $this -> dishes = new DishesModel();//Khởi tạo đối tượng và gán vào dishes
        $this -> dishes -> protect(false); //Bảo vệ bảng
        ///dishes => CONNECT tới bảng admin
    }

    public function getDishesByID($id){
        return $this->dishes->where('d_id',$id)->first();
    }

    public function getAllDishes(){
        return $this->dishes->findAll();
    }
    public function getDataPaginateDishes(){
        return $this -> dishes -> orderBy('d_id','DESC') -> paginate(10);
    }

    public function getPagerDishes(){
        return $this -> dishes -> pager;
    }
    public function themDishes($requestData){
        $validate = $this->validationThemDishes($requestData);
        if($validate->getErrors()){
            
            return [
                'status'=> 'ERROR',
                'messageCode'=>'MESSAGE_ERROR',
                'messages'=> $validate->getErrors()
            ];
        }else{
            try {
                $dataSave = $requestData->getPost();
                unset($dataSave['submit']);
                $file = $requestData -> getFile('file');
                if($file ->isValid() && ! $file ->hasMoved()){
                    $newName = $file -> getRandomName();
                    $file -> move('uploads/',$newName);
                    $dataSave['img'] = $newName;
                }
                $this->dishes->save($dataSave);
                return [
                    'status'=> 'SUCCESS',
                    'messageCode'=>'MESSAGE_SUCCESS',
                    'messages'=> ['MESSAGE_SUCCESS'=>'Thêm món thành công']
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
    
    private function validationThemDishes($requestData){
        //1 mảng trong php
        //$rule = []
        $rule = [
            'title'=>'required|min_length[3]',
            'slogan'=>'required|min_length[3]',
            'price'=>'required|min_length[3]',
        ];
        $message = [
            'title'=>[
                'required'=>'Tên không được để trống',
                'min_length'=>'Tên ít nhất {param} ký tự'
            ],
            'slogan'=>[
                'required'=>'Mô tả không được để trống',
                'min_length'=>'Mô tả ít nhất {param} ký tự'
            ],
            'price'=>[
                'required'=>'Giá tiền không được để trống',
                'min_length'=>'Giá tiền ít nhất {param} ký tự'
            ],
        ];
        $this->validation->setRules($rule,$message);
        //validation = [[rule],[message]]
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }

    public function updateDishes($requestData){
        $validate = $this->validationEditDishes($requestData);
        if($validate->getErrors()){
            
            return [
                'status'=> 'ERROR',
                'messageCode'=>'MESSAGE_ERROR',
                'messages'=> $validate->getErrors()
            ];
        }else{
            try {
                $dataSave = $requestData->getPost();
                unset($dataSave['submit']);
                $file = $requestData -> getFile('file');
                    if($file ->isValid() && ! $file ->hasMoved()){
                        $newName = $file -> getRandomName();
                        $file -> move('uploads/',$newName);
                        $dataSave['img'] = $newName;
                    }
                $this->dishes->update($dataSave["d_id"], $dataSave);
                return [
                    'status'=> 'SUCCESS',
                    'messageCode'=>'MESSAGE_SUCCESS',
                    'messages'=> ['MESSAGE_SUCCESS'=>'Cập nhật thành công']
                ];
            } catch (Exception $e) {
                return [
                    'status'=> 'ERROR',
                    'messageCode'=>'MESSAGE_ERROR',
                    'messages'=> ['MSGSUCCESS'=>$e->getMessage()]
                ];
            }
            
        }
    }

    public function deleteDishes($requestData){
        try {
            $this->dishes->delete($requestData);
            return [
                'status'=> 'SUCCESS',
                'messageCode'=>'MESSAGE_SUCCESS',
                'messages'=> ['MSGSUCCESS'=>'Xoá thành công']
            ];
        } catch (Exception $e) {
            return [
                'status'=> 'ERROR',
                'messageCode'=>'MESSAGE_ERROR',
                'messages'=> ['MSGSUCCESS'=>$e->getMessage()]
            ];
        }
    }

    private function validationEditDishes($requestData){
        $rule = [
            'title'=>'required|min_length[3]',
            'slogan'=>'required|min_length[3]',
            'price'=>'required|min_length[3]',
        ];
        $message = [
            'title'=>[
                'required'=>'Tên không được để trống',
                'min_length'=>'Tên ít nhất {param} ký tự'
            ],
            'slogan'=>[
                'required'=>'Mô tả không được để trống',
                'min_length'=>'Mô tả ít nhất {param} ký tự'
            ],
            'price'=>[
                'required'=>'Giá tiền không được để trống',
                'min_length'=>'Giá tiền ít nhất {param} ký tự'
            ],
        ];
        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }
}
