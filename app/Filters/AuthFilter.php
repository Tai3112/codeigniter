<?php
namespace App\Filters;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    //trước bắt đầu vào 1 trang, nó sẽ vào cái Filter này
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();//Khởi tạo biến session
        if(!$session->get('user_login')){//kiểm tra biến user_login có tồn tại hay không?
            if(current_url() === base_url().'admin/login'){
                return view("admin/index");
            }
            return redirect("admin/login");
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}