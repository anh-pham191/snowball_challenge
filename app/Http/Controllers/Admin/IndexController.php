<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use LayerShifter\TLDExtract;

class IndexController extends Controller
{
	private const SUFFIX = 'suffix';
    public function index()
    {
    	$jsonurl = "https://jsonplaceholder.typicode.com/users";
		$json = file_get_contents($jsonurl);
		$users = json_decode($json);
		$allWebsites = array_column($users, 'website'); //get all websites in arrays
		$allDomains = array_map(array('self', 'getDomain'), $allWebsites); // get the domain name only from every values
		$counts = array_count_values($allDomains); // unify the value by its count
		array_multisort($counts, SORT_DESC);
    	return view('pages.admin.index',compact('users', 'counts'));
	}

	function getDomain($value){
		return tld_extract($value)[self::SUFFIX];
	}
}
