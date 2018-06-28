<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function index()
    {
    	$jsonurl = "https://jsonplaceholder.typicode.com/users";
		$json = file_get_contents($jsonurl);
		$users = json_decode($json);
    	return view('pages.admin.index',compact('users'));
	}
}
