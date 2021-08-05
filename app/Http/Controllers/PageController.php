<?php

namespace App\Http\Controllers;

use App\Models\Main;
use App\Models\Portfolios;
use App\Models\service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $main = Main::first();
        $service = service::all();
        $portfolios = Portfolios::all();
        return view('pages.index', compact('main', 'service', 'portfolios'));
    }

    public function dashbord()
    {
        return view('pages.dashbord');
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
