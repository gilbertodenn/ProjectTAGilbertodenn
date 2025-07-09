<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotConfigController extends Controller
{
    public function index(){
        return view('bot_config');
    }
}
