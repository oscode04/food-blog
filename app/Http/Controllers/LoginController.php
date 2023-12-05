<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        // $isPublikasi = false;
        // $isEdukasi = false;
        // $isWaterTesting = false;
        // $isKontak = false;
        $isLogin = true;
        return view('pages.login', compact('isPublikasi'), compact('isEdukasi'), compact('isKontak'), compact('isLogin'));
    }
}
