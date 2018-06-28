<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function index()
    {
// 		$myfile = fopen("kidney_node.txt", "w") or die("Unable to open file!");
// 		$txt = "Region: /
//  !#nodeset nodes
//  #Fields=1
//  1) coordinates, coordinate, rectangular cartesian, #Components=3
//   x.  Value index=1, #Derivatives=0, #Versions=1
//   y.  Value index=2, #Derivatives=0, #Versions=1
//   z.  Value index=3, #Derivatives=0, #Versions=1
//   ";
// 		fwrite($myfile, $txt);

// 		$i =1;
// 		foreach (file(public_path('kidney_1.txt')) as $name) {
			
// 			if (strpos($name, 'vertex') !== false) {
// 				$txt = "Node: " . $i . '
// ';
// 				fwrite($myfile, $txt);
			
//     			$pieces = explode(" ", $name);
//     			$txt = $pieces[9] . '
// ' .$pieces[10] . '
// ' .$pieces[12] . '
// ';
//     			fwrite($myfile, $txt);
//     			$i++;
// 			}

// 		}
// 		fclose($myfile);

    

    	$jsonurl = "https://jsonplaceholder.typicode.com/users";
		$json = file_get_contents($jsonurl);
		$users = json_decode($json);

        
    	
    	return view('pages.admin.index',compact('users'));
	}
}
