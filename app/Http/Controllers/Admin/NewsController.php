<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //them vao
use App\Http\Controllers\Controller;
use App\News;
use App\Cat;

class NewsController extends Controller
{
	public function __construct(News $objmNews, Cat $objmCat){
		$this->objmNews = $objmNews;
		$this->objmCat = $objmCat;
	}
	public function index(){
		$objNewes  =  $this->objmNews->getItems();
		return view('admin.news.index',compact('objNewes'));
	}
	public function getAdd(){
		$objCats = $this->objmCat->getItems();
		return view('admin.news.add',compact('objCats'));
	}
	public function postAdd(Request $request){
		$file = $request->file('picture');
		if(!is_null($file)){
		//upload file 
			if($request->hasFile('picture')){
				$fileName = $request->picture->getClientOriginalName();//lay ten goc	
				$tmp = explode('.',$fileName);		
				$ext = end($tmp);
				$newName = "VNE-".time().".$ext";
				//dd($newName);
				//$fileName = end($tmp);	
				//$path = $request->file('picture')->store('public/files') ;
				//upload xong đồng thời trả về đường dẫn bắt đầu từ storage/app 

				// $tmp = explode('/',$path);
				//$fileName = end($tmp);
				$path = $request->file('picture')->storeAs(
					'tenTuybien',$newName
				);

				$request->fileName = $newName; //them fileName lun vao dtuong $request
			}else{
				echo "loi upload";
			}
		}else{
			$request->fileName = '';
		}

		// insert vao DB
		if($this->objmNews->addItem($request)){
			$request->session()->flash('msg','Thêm thành công');
			return redirect()->route('admin.news.index');
		}
	}

	public function del(Request $request, $id){
		//kiem tra xoa file
		$objNews = $this->objmNews->getItem($id);
		$fileName = $objNews->picture;
		if($fileName != ''){
			//xoa hinhs
			Storage::delete('public/files'.$fileName);
		}

		if($this->objmNews->delItem($id)){
			$request->session()->flash('msg','Xóa thành công');
			return redirect()->route('admin.user.index');
		}else{
			$request->session()->flash('msg','Lỗi khi xóa');
			return redirect()->route('admin.user.index');
		}
	}
}
