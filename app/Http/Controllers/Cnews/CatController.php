<?php

namespace App\Http\Controllers\Cnews;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatController extends Controller
{
    public function getAdd(){
    	return view ('cnews.cat.add');
    }
}
