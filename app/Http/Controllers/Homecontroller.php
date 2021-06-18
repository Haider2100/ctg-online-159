<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
public function showRegister(){
    $game =['Tom Rider','GTA-5','FIFA 2002','PUBG'];
    $player ='Lara Craft';
    $company ='EA Sports';
    //dd($game);
    return view('register',compact(['game','player','company']));
}
    public function Register()
    {

        return 'Register page12333';
    }

    public function RegisterPut()
    {

        return 'Register PUT ';
    }
    public function RegisterDel()
    {

        return 'Register Delete ';
    }
}
