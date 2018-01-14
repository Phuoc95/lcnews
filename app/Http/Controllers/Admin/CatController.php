<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cat;
use App\Http\Requests\CatRequest;

class CatController extends Controller
{
	public function __construct(Cat $objmCat) { 
		$this->objmCat = $objmCat; 
	}
    public function index() {
    	//$objmCat = new Cat();
    	$objCats =$this->objmCat->getItems();
    	return view('admin.cat.index', compact('objCats'));
    }
    public function getAdd(){
        return view('admin.cat.add');
    }
    public function postAdd(Request $request){
    	// $name = $request->name;
    	if($this->objmCat->addItem($request)){
    		$request->session()->flash('msg','Thêm thành công');
    		return redirect()->route('admin.cat.index');
    	}else{
    		$request->session()->flash('msg','Lỗi khi thêm');
    		return redirect()->route('admin.cat.index');
    	}
    }
    public function del(Request $request, $id){
    	if($this->objmCat->delItem($id)){
    		$request->session()->flash('msg','Xóa thành công');
    		return redirect()->route('admin.cat.index');
    	}else{
    		$request->session()->flash('msg','Lỗi khi xóa');
    		return redirect()->route('admin.cat.index');
    	}
    }

    public function getEdit($id){
    	$objCat=$this->objmCat->getItem($id);
    	return view('admin.cat.edit',compact('objCat'));
    }
    public function postEdit($id, CatRequest $request){
    	if($this->objmCat->editItem($id,$request)){
    		$request->session()->flash('msg','Sửa thành công');
    		return redirect()->route('admin.cat.index');
    	}else{
    		$request->session()->flash('msg','Lỗi khi sửa');
    		return redirect()->route('admin.cat.index');
    	}
    }
}
