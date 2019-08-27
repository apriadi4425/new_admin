<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    public function index(){
    	$data = array(
    		'title' => 'Konfigurasi Menu', 
    		'menus' => Menu::paginate(10)
    	);
    	return view('content/menu',$data);
    }
}
