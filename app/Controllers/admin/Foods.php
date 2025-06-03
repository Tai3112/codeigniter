<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Services\FoodsService;

class Foods extends BaseController
{    
    private $service;
    public function __construct(){
        $this->service = new FoodsService();
    }

    public function index(): string
    {
        $data = [];
        $data['dishes'] = $this->service->getAllDishes();
        $data = $this -> giaodienAdmin($data);
        return view('admin/foods/allmenu', $data);
    }

    public function add(): string
    {
        $data = [];
        $data = $this -> giaodienAdmin($data);
        return view('admin/foods/add', $data);
    }

    public function create(){
        $result = $this->service->themDishes($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
    }
    public function edit($id){
    public function edit($id, $t){
        $data = [];
        $data['food'] = $this->service->getDishesByID($id);
        $data = $this -> giaodienAdmin($data);
        return view('admin/foods/edit', $data);
    }

    public function update(){
        $result = $this -> service -> updateDishes($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
    }

    public function delete($id){
        $result = $this -> service -> getDishesByID($id);
        if($result != null){
            $rs = $this -> service -> deleteDishes($result);
            return redirect("admin/foods")->with($rs['messageCode'],$rs['messages']);
        }else{
            return redirect("admin/foods");
        }
    }
}
