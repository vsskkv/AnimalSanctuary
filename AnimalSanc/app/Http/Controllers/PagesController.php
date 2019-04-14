<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //get the index.blad.php page from (/)
	public function getIndex(){
		return view('Pages.index');
	}

	public function getAbout(){
		return view('Pages.about');
	}

}
