<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KnowledgeCenterController extends Controller
{
    public function index(){
        return view('knowledge_center');
    }
}
