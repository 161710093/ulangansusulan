<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\matkul;
class LatihanController extends Controller
{
    public function tabel()
    {
    		
		$UH=matkul::all();
    	return view('tabel', compact('matkul'));
	

    }
}
