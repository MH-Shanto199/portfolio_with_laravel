<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function dashbord()
    {
        return view('pages.dashbord');
    }

    public function main(){

        return view('pages.main');
    }

    public function service(){

        return view('pages.service');
    }

    public function portfolio(){

        return view('pages.portfolio');
    }

    public function about(){

        return view('pages.about');
    }

    public function contact(){
        
        return view('pages.contact');
    }
}
