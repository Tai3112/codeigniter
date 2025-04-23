<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Services\AdminService;


class Login extends BaseController
{
    private $service;
    public function __construct(){
        $this->service = new AdminService();
    }
    
    public function index(): string
    {
        return view('admin/index');
    }
   public function create()
   {
    $result = $this->service->themAdmin($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
   }
}
