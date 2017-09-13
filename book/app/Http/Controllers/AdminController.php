<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$public = array();
    	$params = 'www';
    	$search = ['11'];
       return view('admin.index');
    }


public function aa(){
$str = 'qqqq';
$array = ['aa','bb'];
$a =1;
$b = 2;
}
