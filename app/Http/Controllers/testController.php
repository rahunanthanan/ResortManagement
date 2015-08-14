<?php namespace App\Http\Controllers;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use  Request;
use PhpParser\Builder;
use App\documents;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Http\Request;
class testController extends Controller
{
    public function daa()
    {
        /***********get login view***********/
        return view('test');
    }



}