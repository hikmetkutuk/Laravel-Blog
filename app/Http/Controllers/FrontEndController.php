<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;

class FrontEndController extends Controller {
    
    public function index() {
        return view('index')
            ->with('title', Setting::first()->site_name)
            ->with('categories', Category::all());
    }
}
