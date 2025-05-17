<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Services\AdminService;

class Foods extends BaseController
{    
    private $service;
    public function __construct(){
        $this->service = new AdminService();
    }

    public function index(): string
    {
        $data = [];
        $data = $this -> giaodienAdmin($data);
        return view('admin/foods/allmenu', $data);
    }
}
