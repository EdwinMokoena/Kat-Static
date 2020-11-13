<?php namespace App\Controllers;

class Home extends BaseController
{

    public function index()
    {
        helper('url');
        return view('index');
    }

    public function services()
    {
        return view("service");
    }

    public function about()
    {
        return view("about");
    }

    public function esg()
    {
        return view("esg");
    }

    public function contact()
    {
        return view("contact");
    }

    public function contact-form()
    {
        //return view("contact");
    }
}
