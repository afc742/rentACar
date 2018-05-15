<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to CarApp';
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'about';
        return view('pages.about')->with('title', $title);
    }

    public function faq(){
        $title = 'faq';
        return view('pages.faq')->with('title', $title);
    }

    public function bank(){
        $title = 'Extra details required';
        return view('pages.bank')->with('title', $title);
    }
}
