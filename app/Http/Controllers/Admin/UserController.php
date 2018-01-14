<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
	public function __construct(User $objmUser){
		$this->objmUser= $objmUser;
	}

	public function index(){
		$objmUser = $this->objmUser->getItems();
		return view('admin.user.index',compact('objmUser'));
	}
	public function getAdd(){
		return view('admin.user.add');
	}
	public function postAdd(UserRequest $request){
		if($this->objmUser->addItem($request)){
			$request->session()->flash('msg','Thêm user thành công !');
			return redirect()->route('admin.user.index');
		}else{
			$request->session()->flash('msg','Không thêm được !');
			return redirect()->route('admin.user.index');
		}
	}

	public function del($id, Request $request){
		if($this->objmUser->delItem($id)){
			$request->session()->flash('msg','Xóa user thành công !');
			return redirect()->route('admin.user.index');
		}else{
			$request->session()->flash('msg','Không xóa được !');
			return redirect()->route('admin.user.index');
		}
	}

	public function getEdit($id){
		$objUser = $this->objmUser->getItem($id);
		return view('admin.user.edit',compact('objUser'));
	}
	public function postEdit($id,Request $request){
		if($this->objmUser->editItem($id,$request)){
			$request->session()->flash('msg','Sửa thành công !');
			return redirect()->route('admin.user.index');
		}else{
			$request->session()->flash('msg','Không sửa được !');
			return redirect()->route('admin.user.index');
		}
	}
}
