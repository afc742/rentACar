<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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

    public function facebook(){
        $title = 'facebook';
        return view('pages.facebook');
    }
    public function fb(){
        $title = 'facebook';
        return view('pages.fb_register');
    }
    public function facebookPost($post_id){
        
        $post = Post::find($post_id);
        return view('pages.facebookPost')->with('make',$post->make)
                                         ->with('model',$post->model)
                                         ->with('desc',$post->desc)
                                         ->with('year',$post->year)
                                         ->with('car_img',$post->car_img)
                                         ->with('post_id', $post_id);
    }
}
