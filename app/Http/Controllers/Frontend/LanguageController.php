<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
class LanguageController extends Controller
{
    //
    public function Ro(){
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'ro');
        return redirect()->back();
    }
    public function Eng(){
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'eng');
        return redirect()->back();
    }
}
