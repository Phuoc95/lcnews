<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $table = "cat";
    protected $primaryKey = 'cid';
    public $timestamps = false;

    public function getItems() {
    	return $this->all(); // Lấy hết tất cả danh mục
    }
    public function addItem($request){
    	$this->name = $request->name;
    	return $this->save();
    }
     public function delItem($id){
    	$objItem = $this->findOrFail($id);
    	return $objItem->delete();
    }

    public function getItem($id){
    	// return $objItem = $this->findOrFail($id);
    	return $this->findOrFail($id);
    }
    public function editItem($id,$request){
    	$objItem = $this->findOrFail($id);
    	$objItem->name = $request->name;
    	return $objItem->save();
    }
}
