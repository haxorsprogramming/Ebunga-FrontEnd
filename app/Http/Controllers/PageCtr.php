<?php

// import namespace 
namespace App\Http\Controllers;
// import lib 
use Illuminate\Http\Request;
// import model 

// import another class 


class PageCtr extends Controller
{

    public function home()
    {
        return view('home.home');
    }

    public function listproduk($id_produk)
    {
        $dr = ['status' => 'sukses'];
    }

}
