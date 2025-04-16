<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [];
        $data = $this -> giaodienClient($data);
        //$data = ['header','footer']
        return view('client/index', $data);
    }

    public function restaurants(): string
    {
        $data = [];
        $data = $this -> giaodienClient($data);
        //$data = ['header','footer']
        return view('client/restaurants', $data);
    }
}
