<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function change_language_ar(){
 
        session()->put('locale', 'ar');
        session()->put('direction', 'rtl');
        return redirect()->back();
    }

    public function change_language_en(){

        session()->put('locale', 'en');
        session()->put('direction', 'ltr');
        return redirect()->back();
    }
}
