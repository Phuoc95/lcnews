<?php

namespace App\Http\Controllers\Cnews;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;

class IndexController extends Controller
{
    public function index() {
    	$objNews = News::paginate(2);
    	return view('cnews.index.index',compact('objNews'));
    }
}
