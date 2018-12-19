<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function index()
    {
        return view('pages.index');
    }

    public function about()
    {
        $title ='Aboutpage';
        return view('pages.about')->with('title', $title);
    }
    public function services()
    {
        return view('pages.about');
    }

    public function first()
    {
        return view('pages.first');
    }

}
