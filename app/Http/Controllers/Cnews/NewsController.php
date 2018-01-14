<?php

namespace App\Http\Controllers\Cnews;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
use App\Cat;

class NewsController extends Controller
{
	public function cat($name , $id) {
		$objCat = Cat::find($id);
		//$objNews = News::where('cid', '=', $id)->orderBy('nid', 'DESC')->get();
		return view('cnews.news.cat',compact('objCat'));
	}

	public function detail ($name , $id) {
		$objNew = News::find($id);
		return view('cnews.news.detail',compact('objNew'));
	}

	public function getAdd(){
		return view('cnews.news.add');
	}
}
